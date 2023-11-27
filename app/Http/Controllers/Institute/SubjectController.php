<?php

namespace App\Http\Controllers\Institute;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subjects = Subject::get();
        return view('institute.subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $class = SchoolClass::pluck('name','id');
         $teacher = Teacher::pluck('name','id');

        return view("institute.subject.create", compact('class','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $subjects = new Subject;
        $subjects->subject = $request->subject;
        $subjects->class_id = $request->class_id;
        $subjects->teacher_id = $request->teacher_id;
        $subjects->institute_id = Auth::user()->id;
        $subjects->save();

        return redirect('institute/subject');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        $class = SchoolClass::pluck('name','id');
        $teacher = Teacher::pluck('name','id');
        
       return view('institute.subject.show', compact('subject','class', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $class = SchoolClass::pluck('name','id');
        $teacher = Teacher::pluck('name','id');

       
        return view("institute.subject.edit", compact('subject','class', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $subject = Subject::find($id);
        $subject->subject = $request->subject;
        $subject->class_id = $request->class_id;
        $subject->teacher_id = $request->teacher_id;
        $subject->institute_id = Auth::user()->id;
        $subject->update();

        
        return redirect('institute/subject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Subject::find($id)->delete();
        return redirect()->route('institute.subject.index')->with('success', 'Subject deleted successfully');
    }
}