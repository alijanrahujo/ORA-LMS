<?php

namespace App\Http\Controllers\Institute;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\AttendanceTeacher;
use App\Http\Controllers\Controller;

class AttendanceTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return 'hello';
        //  $attendanceteacher = AttendanceTeacher::get();
        $attendanceteacher = AttendanceTeacher::get();
        return view('institute.attendanceteacher.index', compact('attendanceteacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $teacher = Teacher::get();
        $teacher = new Teacher;
        $date = '';
        $status = '';
        if (isset($request)) {
            $date = $request->date;
            $status = $request->status;
            $teacher = $teacher->where('status', $status);
        }

        $teachers = $teacher->get();

        return view("institute.attendanceteacher.create", compact('teachers', 'date', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $teacherData = [];

        foreach ($request->teacher_id as $key => $val) {
            $attendance = $request->attendance[$key];
            $teacher_id = $val;
            $date = $request->date;

            // Fetch teacher data
            $teacher = Teacher::find($teacher_id);

            // Check if the teacher exists
            if ($teacher) {
                // Create a new AttendanceTeacher record
                $attendanceTeacher = new AttendanceTeacher;
                $attendanceTeacher->name = $teacher->name;
                $attendanceTeacher->email = $teacher->email;
                $attendanceTeacher->phone = $teacher->phone;
                $attendanceTeacher->attendance = $attendance;
                $attendanceTeacher->date = $date;
                $attendanceTeacher->save();

                // Optionally, you can add the inserted record to the $teacherData array
                $teacherData[] = $attendanceTeacher;
            }
        }
        $teacher->save();

        return redirect('institute/teacher_attendance');
    } 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $attendanceteacher = AttendanceTeacher::find('$id');
        return view('institute.attendanceteacher.show', compact('attendanceteacher'));
    }
    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
        $attendanceteacher = AttendanceTeacher::find($id);
        $attendanceteacher->delete();

        return redirect('institute/attendance_teacher')->with('Success', 'Attendance Deleted Successfully');
    }
}
