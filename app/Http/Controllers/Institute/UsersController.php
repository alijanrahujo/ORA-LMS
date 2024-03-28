<?php

namespace App\Http\Controllers\Institute;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institute_id = auth()->user()->institute_id;
        $user = Users::where('institute_id', $institute_id)->get();
        return view('institute.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institute_id     = auth()->user()->institute_id;
        $role = Role::pluck('name', 'id');
        $user = User::where('institute_id', $institute_id)->get();
        return view('institute.user.create', compact('user', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'religion' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'joining_date' => 'required|date',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Store the file
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');


        $user = new Users();
        $user->name = $request->name;
        $user->religion = $request->religion;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->joining_date = $request->joining_date;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->profile_picture = $imagePath; // Save the image path to the database
        $user->institute_id = Auth::user()->id;
        $user->save();
        return redirect('institute/user')->with('success', 'User Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     return $id;
    //     //
    //     $user = Users::find($id);
    //     return view('institute.user.show', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('institute.user.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // return $request;
        $user = Users::find($id);
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->name = $request->name;
        $user->religion = $request->religion;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->joining_date = $request->joining_date;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->profile_picture = $imagePath; // Save the image path to the database
        $user->update();
        return redirect('institute/user')->with('success', 'User Successfully Registered');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $user = Users::find($id);
      $user->delete();
      return redirect('institute/user')->with('success', 'User Succesfully Deleted');
    }
}
