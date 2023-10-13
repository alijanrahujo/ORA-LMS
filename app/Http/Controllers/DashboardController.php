<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('Super-Admin'))
        {
            return redirect()->route('superadmin.dashboard');
        }
        else
        {
            return redirect()->route('institute.dashboard');
        }
    }

    public function superadmin()
    {
        return view('superadmin.dashboard');
    }
    
    public function institute()
    {
        return view('dashboard');
    }
}
