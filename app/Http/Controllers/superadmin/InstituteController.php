<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\User;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::get();
        return view('superadmin.institute.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $logo = $file->getClientOriginalName();
            $logo = time() . '.' . $logo;
            $path = $file->storeas('public', $logo);
            $path = public_path($logo);
        } else {
            $logo = 'null';
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->save();

        $institute = new Institute;
        $institute->name = $request->name;
        $institute->owner_name = $request->owner_name;
        $institute->cnic = $request->cnic;
        $institute->designation = $request->designation;
        $institute->address = $request->address;
        $institute->city = $request->city;
        $institute->phone = $request->phone;
        $institute->phone2 = $request->phone2;
        $institute->sector = $request->sector;
        $institute->type = $request->type;
        $institute->status = $request->status;
        $institute->user_id = $user->id;
        $institute->logo = $logo;
        $institute->save();

        return redirect('superadmin/institute')->with('success','Institute Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institute $institute)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institute $institute)
    {
        return view('superadmin.institute.edit',compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institute $institute)
    {
        $institute->update($request->all());

        $user = User::find($institute->user_id);
        $user->email = $request->email;
        $user->password = $request->has('password') ? Hash::make($request->password) : $user->password;
        $user->update();
        return redirect('superadmin/institute')->with('success','Institute Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $institute = Institute::find($id);
        $institute->user->delete();
        $institute->delete();
        return redirect('superadmin/institute')->with('success','Institute Successfully Deleted');
    }
}
