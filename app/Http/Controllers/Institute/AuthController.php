<?php

namespace App\Http\Controllers\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        
        return view('institute.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('web')->attempt($request->only('email','password')))
        {
            return redirect('institute/dashboard')->with('success', "Sign in successfully");
        }

        return redirect()->back()->with('error', "The provided credentials do not match our records.");

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}