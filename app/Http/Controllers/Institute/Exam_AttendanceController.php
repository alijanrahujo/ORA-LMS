<?php

namespace App\Http\Controllers\Institute;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\Exam_Attendance;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class Exam_AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exam_attendance = Exam_Attendance::get();
        return view('institute.exam_attendance.index', compact('exam_attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {

        $students = Student::get();
        $student = new Student; // Use AttendanceStudent model here
        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $subjects = Subject::pluck('subject', 'id');
        $exam = Exam::pluck('exam_name', 'id');

        if ($request->ajax()) {
            // return $request;
            $student = $student->where(['class_id' => $request->class_id,  'section_id' => $request->section_id]);
            return DataTables::of($student)
                ->addColumn('action', function ($row) {
                    $html = '';
                    // $attendanceOptions = [
                    //     1 => 'Present',
                    //     2 => 'Absent',

                    // ];

                    // foreach ($attendanceOptions as $value => $label) {
                        $html .=
                '
                  <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="attendance[' . $row->id . ']" value="Present" checked>
                        <label class="form-check-label" for="optionPresent">Present</label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="attendance[' . $row->id . ']" value="Absent">
                        <label class="form-check-label" for="optionAbsent">Absent</label>
                    ';


                    $html .= '<input type="hidden" name="student_id[]" value="' . $row->id . '">';  // Assuming $row->id is the student ID

                    return $html;
                })
                ->addColumn('section', function ($row) {
                    return $row->name;
                })
                ->addColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->make(true);
        }

        $students = $student->get();

        return view('institute.exam_attendance.create', compact('classes', 'subjects', 'sections', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $studentData = [];

        foreach ($request->student_id as $key => $val) {
            $attendance = $request->attendance[$val];
            $student_id = $val;
            $subjects   = $request->subject_id;
            $classes    = $request->class_id;
            $sections   = $request->section_id;
            $exam       = $request->exam_id;
            $student = Student::find($student_id);

            if ($student) {
                // Create a new AttendanceStudent record
                $exam_attendance = new Exam_Attendance;
                $exam_attendance->student_name = $student->name;
                $exam_attendance->mobile = $student->mobile; // I assumed 'phone' is the correct attribute, change if needed
                $exam_attendance->roll = $student->roll_number;

                $exam_attendance->attendance = $attendance;
                $exam_attendance->exam_id = $exam;
                $exam_attendance->class_id = $classes;
                $exam_attendance->subject_id = $subjects;
                $exam_attendance->section_id = $sections;
                $exam_attendance->student_id = $student_id;
                $exam_attendance->save();

                // Optionally, you can add the inserted record to the $studentData array
                $studentData[] = $exam_attendance;
            }
        }

        // Remove this line, as it is outside the loop
        // $student->save();

        return redirect('institute/exam_attendance');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam_Attendance $exam_Attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam_Attendance $exam_Attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam_Attendance $exam_Attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Exam_Attendance::destroy($id);

        return redirect('institute/exam_attendance')->with('Success', 'Exam Attendance Deleted Successfully');
    }
}
