<?php

namespace App\Http\Controllers\Institute;

use App\Models\Syllabus;
use App\Models\SchoolClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "working";
        $institute_id = auth()->user()->institute_id;
        $syllabus = Syllabus::where('institute_id', $institute_id)->get();
        return view('institute.syllabus.index', compact('syllabus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::pluck('name', 'id'); //this is use for if get the id and name
        return view('institute.syllabus.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $syllabus = new Syllabus;
        $syllabus->title = $request->title;
        $syllabus->description = $request->description;
        $syllabus->class_id = $request->class_id;
        $syllabus->file = $request->file;
        // $syllabus->status = $request->status;
        $syllabus->save();

        return redirect('institute/syllabus')->with('Success', 'Institute Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $syllabus = Syllabus::find($id);
        return view('institute.syllabus.show', compact('syllabus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $syllabus = Syllabus::find($id);
        $classes = SchoolClass::pluck('name', 'id');
        return view('institute.syllabus.edit', compact('syllabus', 'classes'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $syllabus = Syllabus::find($id);
        $syllabus->title       = $request->title;
        $syllabus->description = $request->description;
        $syllabus->class_id    = $request->class_id;
        $syllabus->file        = $request->file;
        $syllabus->update();
        return redirect('institute/syllabus')->with('Success', 'Syllabus Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::find($id);
        $syllabus->delete();
        return redirect('institute/syllabus')->with('Success', 'Syllabus Successfully Deleted');
    }
}