<?php

namespace App\Http\Controllers\Institute;

use id;
use App\Models\Teacher;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academic_year_id = Auth::user()->academic_id;
        $institute_id     = auth()->user()->institute_id;
        // return $academic_year_id;
        //$teachers = Teacher::where('academic_year_id', $academic_year_id)->with('Teacher')->get();
        $teachers = Teacher::where('academic_year_id', $academic_year_id)->where('institute_id', $institute_id)->with('AcademicYear')->get();
        // return $teachers;
        return view("institute.teacher.index", compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $academic_year_id = AcademicYear::pluck('starting_date', 'id');
        return view('institute.teacher.create', compact('academic_year_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $academic_year_id = Auth::user()->academic_id;
        // return $request;
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->education = $request->education;
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->phone = $request->phone;
        $teacher->mobile = $request->mobile;
        $teacher->email = $request->email;
        $teacher->status = $request->status;
        $teacher->academic_year_id = $academic_year_id;
        $teacher->institute_id = Auth::user()->id;
        $teacher->user_id = Auth::user()->id;
        $teacher->save();

        return redirect('institute/teacher')->with('success', 'Institute Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $teacher = Teacher::find($id);
        return view('institute.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('institute.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // return $request;
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->education = $request->education;
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->phone = $request->phone;
        $teacher->mobile = $request->mobile;
        $teacher->email = $request->email;
        $teacher->status = $request->status;
        $teacher->institute_id = Auth::user()->id;
        $teacher->user_id = Auth::user()->id;
        $teacher->update();
        return redirect('institute/teacher')->with('success', 'Teacher Successfully Updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('institute/teacher')->with('success', 'Teacher Successfully Deleted');
    }
}