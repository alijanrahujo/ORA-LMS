<?php

namespace App\Http\Controllers\Institute;

use App\Models\Section;
use App\Models\Student;
// use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Spatie\FlareClient\Report;
use Yajra\DataTables\DataTables;
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

        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        // $subjects = Subject::pluck('subject', 'id');
        $date = $request->date;

        if ($request->ajax()) {

            $student = $student->where([
                'status'      => $request->status,
                // 'date'        => $request->date,
                // 'section_id'  => $request->section_id,
                // 'class_id'    => $request->class_id
            ]);
            return DataTables::of($student)
                ->addColumn('action', function ($row) {
                    // $html = '<input class="form-check-input" type="radio"
                    //                                              name="attendance[].' . $row->id . '"
                    //                                              id="' . $row->id . '" value="1">
                    //                                          <label class="form-check-label" for="present">
                    //                                              Present
                    //                                          </label>';


        //             $html = '<div class="form-check-inline">
        //     <input class="form-check-input" type="radio"
        //         name="attendance[' . $row->id . ']"
        //          value="1">
        //     <label class="form-check-label" for="present">
        //         Present
        //     </label>
        //  </div>

        //  <div class="form-check-inline">
        //     <input class="form-check-input" type="radio"
        //         name="attendance[' . $row->id . ']"
        //           value="2">
        //     <label class="form-check-label" for="lateExcuse">
        //         Late Present With Excuse
        //     </label>
        //  </div>

        //  <div class="form-check-inline">
        //     <input class="form-check-input" type="radio"
        //         name="attendance[' . $row->id . ']"
        //           value="3">
        //     <label class="form-check-label" for="late">
        //         Late Present
        //     </label>
        //  </div>

        //  <div class="form-check-inline">
        //     <input class="form-check-input" type="radio"
        //         name="attendance[' . $row->id . ']"
        //           value="4">
        //     <label class="form-check-label" for="absent">
        //         Absent
        //     </label>
        //  </div>
        //  <input type="hidden" name="student_id[]" value="' . $row->id . '">';  // Assuming $row->id is the student ID

$html = '';
$attendanceOptions = [
    1 => 'Present',
    2 => 'Late Present With Excuse',
    3 => 'Late Present',
    4 => 'Absent',
];

foreach ($attendanceOptions as $value => $label) {
    $html .= '
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="attendance[' . $row->id . ']" value="' . $value . '">
            <label class="form-check-label" for="option' . $value . '">
                ' . $label . '
            </label>
        </div>';
}

$html .= '<input type="hidden" name="student_id[]" value="' . $row->id . '">';  // Assuming $row->id is the student ID

return $html;
})
->make(true);
}

$students = $student->get();

return view("institute.attendancestudent.create", compact('students', 'date', 'status', 'classes', 'sections'));} //


/**
* Store a newly created resource from storage.
*/
public function store(Request $request)
{

// return $request;
$studentData = [];

foreach ($request->student_id as $key => $val) {
$attendance = $request->attendance[$val];
$student_id = $val;
$date = $request->date;
$classes = $request->class_id;
$sections = $request->section_id;
$student = Student::find($student_id);

if ($student) {
// Create a new AttendanceStudent record
$attendanceStudent = new AttendanceStudent;
$attendanceStudent->student_name = $student->name;
$attendanceStudent->phone = $student->phone; // I assumed 'phone' is the correct attribute, change if needed
$attendanceStudent->roll = $student->roll_number;

$attendanceStudent->attendance = $attendance;
$attendanceStudent->date = $date;
$attendanceStudent->class_id = $classes;
// $attendanceStudent->subject_id = $subjects;
$attendanceStudent->section_id = $sections;
$attendanceStudent->student_id = $student_id;
$attendanceStudent->save();

// Optionally, you can add the inserted record to the $studentData array
$studentData[] = $attendanceStudent;
}
}

// Remove this line, as it is outside the loop
// $student->save();

return redirect('institute/student_attendance');
}

/**
* Remove the specified resource from storage.
*/



public function destroy($id)
{
AttendanceStudent::destroy($id);

return redirect('institute/student_attendance')->with('Success', 'Attendance Deleted Successfully');
}
}