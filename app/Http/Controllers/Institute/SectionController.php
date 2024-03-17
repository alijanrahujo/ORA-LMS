<?php

namespace App\Http\Controllers\Institute;

use App\Models\Section;
use App\Models\Teacher;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\TeacherController;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institute_id = auth()->user()->institute_id;
        $sections = Section::where('institute_id', $institute_id)->get();
        return view('institute.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        return view('institute.section.create', compact('classes','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->name;
        $section->capacity = $request->capacity;
        $section->category = $request->category;
        $section->status = $request->status;
        $section->teacher_id = $request->teacher_id;
        $section->class_id = $request->class_id;
        $section->save();

        return redirect('institute/section');

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $classes = SchoolClass::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        return view('institute.section.edit', compact('classes','teachers', 'section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = section::find($id);
        $section->delete();
        return redirect('institute/section')->with('success','Section Successfully Deleted');
    }
}
