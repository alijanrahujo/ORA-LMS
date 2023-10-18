<?php

namespace App\Http\Controllers\Institute;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('institute.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institute.student.create');
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
        $student->guardion_name = $request->guardion_name;
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
        $student->save();

        return redirect('institute.student.index');


        




    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
