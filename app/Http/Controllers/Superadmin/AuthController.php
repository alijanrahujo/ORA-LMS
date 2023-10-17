<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('superadmin.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('superadmin')->attempt($request->only('email','password')))
        {
            return redirect('superadmin/dashboard')->with('success', "Sign in successfully");
        }

        return redirect()->back()->with('error', "The provided credentials do not match our records.");

    }

    public function logout()
    {
        Auth::guard('superadmin')->logout(); // Log out the user from the "superadmin" guard
        return redirect('/');
    }
}
