<?php

namespace App\Http\Controllers\Institute;

use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Spatie\FlareClient\Report;
use App\Models\AttendanceStudent;
use App\Http\Controllers\Controller;

class AttendanceStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //    return 'HEllo';
        $attendance_student = AttendanceStudent::get();
        return view('institute.attendancestudent.index', compact('attendance_student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $students = Student::get();
        $student = new Student; // Use AttendanceStudent model here
        $date = '';
        $status = '';

        if (isset($request)) {
            $date = $request->date;
            $classes = SchoolClass::pluck('name', 'id');
            $sections = Section::pluck('name', 'id');
            $subjects = Subject::pluck('subject', 'id');
            $status = $request->status;
            $student = $student->where('status', $status);
        }

        $students = $student->get();

        return view("institute.attendancestudent.create", compact('students', 'date', 'status', 'classes', 'sections', 'subjects')); // Corrected the view name
    }

    /**
     * Store a newly created resource from storage.
     */
    public function store(Request $request)
    {
        return $request;
        $studentData  = [];
        foreach ($request->student_id as $key => $val) {
            $attendance  =  $request->attendance[$key];
            $student_id  = $val;
            $date        = $request->date;
            $student = Student::find($student_id);

            if ($student) {

                // Create a new AttendanceTeacher record
                $attendanceStudent = new AttendanceStudent;
                $attendanceStudent->student_name  = $student->student_name;
                $attendanceStudent->email = $student->email;
                $attendanceStudent->roll = $student->roll;
                $attendanceStudent->attendance   = $attendance;
                $attendanceStudent->date = $date;
                $attendanceStudent->save();

                // Optionally, you can add the inserted record to the $teacherData array
              return  $stdentuata[] = $attendanceStudent;
            }
        }
        $student->save();

        return redirect('institute/student_attendance');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendancestudent = AttendanceStudent::find($id);
        $attendancestudent->delete();
        return redirect('institute/attendance_student')->with('Success', 'Attendance Deleted Successfully');
    }
}
