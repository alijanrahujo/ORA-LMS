<?php

namespace App\Http\Controllers\Institute;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Models\SchoolClass;
use App\Models\Section;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('institute.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $classes = SchoolClass::pluck('name', 'id');
        $guards = Guardian::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        return view('institute.student.create', compact('classes', 'guards', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $student = new Student;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->guardian_id = $request->guard_id;
        $student->mother_name = $request->mother_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->mobile = $request->mobile;
        $student->date = $request->date;
        $student->roll_number = $request->roll_number;
        $student->reg_number = $request->reg_number;
        $student->monthly_fee = $request->monthly_fee;
        $student->status = $request->status;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->save();

        return redirect('institute/student');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('institute.student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = SchoolClass::pluck('name', 'id');
        $guards = Guardian::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        return view('institute.student.edit', compact('student', 'classes', 'guards', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $student = Student::find($id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->guardian_id = $request->guardian_id;
        $student->mother_name = $request->mother_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->mobile = $request->mobile;
        $student->date = $request->date;
        $student->roll_number = $request->roll_number;
        $student->reg_number = $request->reg_number;
        $student->monthly_fee = $request->monthly_fee;
        $student->status = $request->status;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->update();

        return redirect('institute/student')->with('success', 'Student Successfully Updated');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect('institute/student')->with('success', 'Student Successfully Deleted');
    }
}
