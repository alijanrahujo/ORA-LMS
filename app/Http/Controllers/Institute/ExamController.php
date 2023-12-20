<?php

namespace App\Http\Controllers\Institute;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::get();
        return view('institute.exam.index', compact('exams'));
    }

    public function create()
    {
        $exam = Exam::get();
        return view("institute.exam.create");
    }

    public function store(Request $request)
    {
        //return $request;
        $exam = new Exam;
        $exam->exam_name = $request->exam_name;
        $exam->date   = $request->date;
        $exam->note  = $request->note;
        $exam->save();

        return redirect('institute/exam')->with('success', 'Exam Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $exam = Exam::find($id);
    //     return view('institute.exam.show', compact('exam'));
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('institute.exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $exam = Exam::find($id);
        $exam->exam_name = $request->exam_name;
        $exam->date   = $request->date;
        $exam->note  = $request->note;
        $exam->update();

        return redirect('institute/exam')->with('success', 'Exam Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //  return $id;
        $exam = Exam::find($id);
        //return $exam;
        $exam->delete();
        return redirect('institute/exam')->with('success', 'Exam Successfully Deleted');
    }
}