<?php

namespace App\Http\Controllers\Institute;

use App\Models\Mark_Distribtion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class MarkDistributionController extends Controller
{
    //Display  a listing of the resource.

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        $institute_id = auth()->user()->institute_id;

        if ($search != "") {
            $mark = Mark_Distribtion::where('mark_distribution', '=', $search)
                ->where('institute_id', $institute_id)
                ->get();
        } else {
            $mark = Mark_Distribtion::where('institute_id', $institute_id)->get();
        }

        $data = compact('mark', 'search');
        return view('institute.mark_distribution.index')->with($data);
    }

    public function create()
    {
        $mark = Mark_Distribtion::get();
        return view("institute.mark_distribution.create");
    }


    public function store(Request $request)
    {
        //return $request;
        $mark = new  Mark_Distribtion();
        $mark->mark_distribution = $request->mark_distribution;
        $mark->mark_value   = $request->mark_value;
        $mark->save();

        return redirect('institute/mark_distribution')->with('success', 'Mark Distribution Successfully Registered');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mark = Mark_Distribtion::find($id);
        return view('institute.mark_distribution.edit', compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $mark = Mark_Distribtion::find($id);
        $mark->mark_distribution = $request->mark_distribution;
        $mark->mark_value   = $request->mark_value;
        $mark->update();
        return redirect('institute/mark_distribution')->with('success', 'Mark Distribution Successfully Updated');
    }
}
