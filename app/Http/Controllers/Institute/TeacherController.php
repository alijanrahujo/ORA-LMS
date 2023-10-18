<?php

namespace App\Http\Controllers\Institute;

use App\Models\Teacher;
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
        $teachers = Teacher::get();
        return view("institute.teacher.index", compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institute.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request
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
        $teacher->institute_id = Auth::user()->id;
        $teacher->user_id = Auth::user()->id;
        $teacher->save();

        return redirect('institute/teacher')->with('success', 'Institute Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
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
        return redirect('institute/teacher')->with('succes', 'Teacher Successfully Updated');
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
