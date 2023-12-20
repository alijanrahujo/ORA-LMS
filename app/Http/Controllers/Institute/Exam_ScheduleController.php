<?php

namespace App\Http\Controllers\Institute;

use App\Models\Section;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Exam_ScheduleController extends Controller
{
    public function index()
    {
        $exam_schedule = ExamSchedule::get();
        return view('institute.exam_schedule.index', compact('exam_schedule'));
    }

    public function create()
    {
        $exam_schedule = ExamSchedule::get();
        $classes = SchoolClass::pluck('name', 'id');
        $subjects = Subject::pluck('subject', 'id');
        $sections = Section::pluck('name', 'id');
        return view('institute.exam_schedule.create', compact('classes', 'subjects', 'sections'));
    }

    public function store(Request $request)
    {
        //return $request;
        $exam_schedule = new ExamSchedule;
        $exam_schedule->exam_name = $request->exam_name;
        $exam_schedule->date = $request->date;
        $exam_schedule->time_from = $request->time_from;
        $exam_schedule->time_to = $request->time_to;
        $exam_schedule->class_id = $request->class_id;
        $exam_schedule->section_id = $request->section_id;
        $exam_schedule->subject_id = $request->subject_id;
        $exam_schedule->room = $request->room;
        $exam_schedule->save();
        return redirect('institute/exam_schedule')->with('success', 'Exam Successfully Registered');

        // Redirect to the specified URI
        // return redirect('institute/exam_schedule');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return $id;
        $exam_schedule = ExamSchedule::find($id);
        $classes = SchoolClass::pluck('name', 'id');
        $subjects = Subject::pluck('subject', 'id');
        $sections = Section::pluck('name', 'id');
        return view('institute.exam_schedule.edit', compact('classes', 'subjects', 'sections', 'exam_schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $exam_schedule = ExamSchedule::find($id);
        $exam_schedule->exam_name = $request->exam_name;
        $exam_schedule->date = $request->date;
        $exam_schedule->time_from = $request->time_from;
        $exam_schedule->time_to = $request->time_to;
        $exam_schedule->class_id = $request->class_id;
        $exam_schedule->section_id = $request->section_id;
        $exam_schedule->subject_id = $request->subject_id;
        $exam_schedule->room = $request->room;
        $exam_schedule->update();

        return redirect('institute/exam_schedule')->with('success', 'Exam Schedule Successfully Updated');
    }
    public function destroy($id)
    {
        $exam_schedule = ExamSchedule::find($id);
        $exam_schedule->delete();
        return redirect('institute/exam_schedule')->with('success', 'Exam Schedule Successfully Deleted');
    }
}
