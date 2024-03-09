<?php

namespace App\Http\Controllers\Institute;

use PDF;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\Mark_Distribtion;
use App\Models\AttendanceStudent;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;




class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $mark = Mark::where('student_name', '=', $search)->get();
        } else {
            $mark = Mark::all();
        }
        // $mark = Mark_Distribtion::get();
        $data = compact('mark', 'search');
        // $mark = Mark::get();
        return view('institute.mark.index')->with($data);
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
        $mark = Mark::with('subject')->find($id);
        // $subject = $mark->with('subject')->get();
        $student = Student::find($mark->student_id);
        //return $student->marks;
        // Returning the view with data
        return view('institute.mark.show', compact('mark', 'student'));
    }


    // public function downloadPdf($id)
    // {
    //     $mark = Mark::with('subject')->find($id);
    //     $student = Student::find($mark->student_id);


    //     return view('pdf.mark', compact('mark', 'student'));

    //     // Load the view and pass data to it
    //     $pdf = PDF::loadView('pdf.mark', compact('mark', 'student'));

    //     // Download the PDF file with a custom name
    //     return $pdf->download('mark_sheet.pdf');
    // }



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