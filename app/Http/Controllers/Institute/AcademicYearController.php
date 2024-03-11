<?php

namespace App\Http\Controllers\Institute;

use App\Models\User;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return 'hello';
        $academic = AcademicYear::get();
        return view('institute.academic_year.index', compact('academic'));
    }

    public function create()
    {
        $academic = AcademicYear::get();
        return view("institute.academic_year.create");
    }

    public function store(Request $request)
    {
        //return $request;
        $academic = new AcademicYear();
        $academic->year = $request->year;
        $academic->year_title = $request->year_title;
        $academic->starting_date   = $request->starting_date;
        $academic->ending_date   = $request->ending_date;
        $academic->save();

        return redirect('institute/academic_year')->with('success', 'Academic Successfully Registered');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $academic = AcademicYear::find($id);
        return view('institute.academic_year.edit', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $academic = AcademicYear::find($id);
        $academic->year = $request->year;
        $academic->year_title = $request->year_title;
        $academic->starting_date   = $request->starting_date;
        $academic->ending_date   = $request->ending_date;
        $academic->update();

        return redirect('institute/academic_year')->with('success', 'Academic Year Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //  return $id;
        $academic = AcademicYear::find($id);
        //return $exam;
        $academic->delete();
        return redirect('institute/academic_year')->with('success', 'Academic Year Successfully Deleted');
    }
    public function academic_year_change(Request $request)
    {
        // Get the authenticated user
        $user = User::find(Auth::user()->id); 
        $user->update([
            'academic_id' => $request->academic_id,
            'updated_at' => now()->toDateTimeString() // Format current datetime as string
        ]);

        // Redirect back
        return redirect()->back();
    }

}