<?php

namespace App\Http\Controllers\Institute;

use App\Models\Institute;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::get();
        return View('institute.class.index',compact('classes'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institute.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $class = new SchoolClass;
        $class->name= $request->class_name;
        $class->level =$request->class_level;
        $class->status = $request->class_status; 
        $class->institute_id = Auth::user()->id;

        $class->save();
        return redirect('institute/class')->with('success','Class Successfully Registered');

    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $schoolClass)
    {
        //
    }
}
