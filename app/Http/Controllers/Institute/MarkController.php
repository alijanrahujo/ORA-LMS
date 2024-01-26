<?php

namespace App\Http\Controllers\Institute;

use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mark = Mark::get();
        return view('institute.mark.index', compact('mark'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        // return $request;
        $students = Student::get();
        $student = new Student; // Use AttendanceStudent model here
        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $subjects = Subject::pluck('subject', 'id');
        $exam = Exam::pluck('exam_name', 'id');

        if ($request->ajax()) {
            $student = $student->where(['class_id' => $request->class_id,  'section_id' => $request->section_id]);
            $subject = Subject::where('id', $request->subject_id)->first();
            return DataTables::of($student)
                ->addColumn('action', function ($row) use ($subject) {
                    $html = '';

                    $html .= '
                   <div class="form-check-inline">
                   <input type="number" name="obt[]" class="form-control obt-input" value="' .
                        $row->obt . '" step="any">
                    </div>';

                    $html .= '<input type="hidden" name="student_id[]" value="' . $row->id . '">';

                    $html .= '<input type="hidden" name="marks[]" value="' . $subject->marks . '">';

                    return $html;
                })
                ->addColumn('marks', function ($row) use ($subject) {

                    return $subject->marks ?? '';
                })

                ->addColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->make(true);
        }

        $students = $student->get();

        return view('institute.mark.create', compact('classes', 'subjects', 'sections', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $studenData = [];

        foreach ($request->student_id as $key => $val) {
            // $attendance = $request->attendance[$val];
            $obt        = $request->obt[$key];
            $marks        = $request->marks[$key];
            $student_id = $val;
            $subjects   = $request->subject_id;
            $classes    = $request->class_id;
            $sections   = $request->section_id;
            $exam       = $request->exam_id;
            $student = Student::find($student_id);

            if ($student) {
                // Create a new AttendanceStudent record
                $mark = new Mark;
                $mark->student_name = $student->name;
                $mark->mobile = $student->mobile; // I assumed 'phone' is the correct attribute, change if needed
                $mark->roll = $student->roll_number;
                $mark->obt = $obt;
                $mark->marks = $marks;

                $mark->exam_id = $exam;
                $mark->class_id = $classes;
                $mark->subject_id = $subjects;
                $mark->section_id = $sections;
                $mark->student_id = $student_id;
                $mark->save();

                // Optionally, you can add the inserted record to the $studentData array
                $studentData[] = $mark;
            }
        }

        return redirect('institute/mark');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mark = Mark::find($id);
        return view('institute.mark.show', compact('mark'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();
        return redirect('institute/mark')->with('success', 'Mark Successfully Deleted');
    }
}