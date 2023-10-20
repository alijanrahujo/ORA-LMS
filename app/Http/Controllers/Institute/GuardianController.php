<?php

namespace App\Http\Controllers\Institute;

use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::get();
        return view('institute.guardian.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institute.guardian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $guardian = new Guardian;
        $guardian->name = $request->name;
        $guardian->address = $request->address;
        $guardian->city = $request->city;
        $guardian->phone = $request->phone;
        $guardian->mobile = $request->mobile;
        $guardian->status = $request->status;
        $guardian->save();

        return redirect('institute/guardian');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guardian = Guardian::find($id);
        return view('institute.guardian.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        return view('institute.guardian.edit', compact('guardian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $guardian = Guardian::find($id);
        $guardian->name = $request->name;
        $guardian->address = $request->address;
        $guardian->city = $request->city;
        $guardian->phone = $request->phone;
        $guardian->mobile = $request->mobile;
        $guardian->status = $request->status;
        $guardian->update();

        return redirect('institute/guardian')->with('success', 'Guardian Successfully Updated');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guardian = guardian::find($id);
        $guardian->delete();
        return redirect('institute/guardian')->with('success', 'Guardian Successfully Deleted');
    }
}
