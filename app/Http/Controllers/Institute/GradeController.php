<?php

namespace App\Http\Controllers\Institute;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institute_id = auth()->user()->institute_id;
        $grades = Grade::where('institute_id', $institute_id)->get();
        return view('institute.grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $grades = Grade::get();
        return view("institute.grade.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //return $request;
        $grades = new Grade;
        $grades->grade_name = $request->grade_name;
        $grades->grade_point = $request->grade_point;
        $grades->mark_from = $request->mark_from;
        $grades->mark_to = $request->mark_to;
        $grades->note  = $request->note;
        $grades->save();

        return redirect('institute/grade')->with('success', 'Grade Successfully Registered');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grades = Grade::find($id);
        return view('institute.grade.edit', compact('grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // return $id;
        $grades = Grade::find($id);
        // $grades = new Grade;
        $grades->grade_name = $request->grade_name;
        $grades->grade_point = $request->grade_point;
        $grades->mark_from = $request->mark_from;
        $grades->mark_to = $request->mark_to;
        $grades->note  = $request->note;
        $grades->update();

        return redirect('institute/grade')->with('success', 'Grade Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grades = Grade::find($id);
        //return $exam;
        $grades->delete();
        return redirect('institute/grade')->with('success', 'Grade Successfully Deleted');
    }
}