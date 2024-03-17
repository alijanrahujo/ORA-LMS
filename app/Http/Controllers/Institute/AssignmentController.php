<?php

namespace App\Http\Controllers\Institute;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return 'hello';
        $institute_id = auth()->user()->institute_id;
        $assignment = Assignment::where('institute_id', $institute_id)->get();
        return view('institute.assignment.index', compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $subjects = Subject::pluck('subject', 'id');

        return view('institute.assignment.create', compact('classes', 'sections', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the uploaded file to the storage directory
        $file->move(public_path('Assignments'), $filename);


        // $file = $request->file('file');
        // $path = $file->store('Assignments');
        // $fullPath = Storage::path($path);

        // $request->files('$file')->store('Assignment');

        $assignment = new Assignment;
        $assignment->title       = $request->title;
        $assignment->description = $request->description;
        $assignment->deadline    = $request->deadline;
        $assignment->class_id    = $request->class_id;
        $assignment->section_id  = $request->section_id;
        $assignment->subject_id  = $request->subject_id;
        $assignment->file = $filename;
        $assignment->save();
        return redirect('institute/assignment')->with('Success', 'Assignment Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        return view('institute.assignment.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $assignment = Assignment::find($id);
        $classes    = SchoolClass::pluck('name', 'id');
        $sections   = Section::pluck('name', 'id');
        $subjects   = Subject::pluck('subject', 'id');
        return view('institute.assignment.edit', compact('assignment', 'classes', 'sections', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $assignment = Assignment::find($id);
        $assignment->title       = $request->title;
        $assignment->description = $request->description;
        $assignment->deadline    = $request->deadline;
        $assignment->class_id    = $request->class_id;
        $assignment->section_id  = $request->section_id;
        $assignment->subject_id  = $request->subject_id;
        $assignment->file = $request->file;
        $assignment->update();
        return redirect('institute/assignment')->with('Success', 'Assignment Updated  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return redirect('institute/assignment')->with('Success', 'Assignment Deleted Successfully');
    }
}