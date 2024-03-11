<?php

namespace App\Http\Controllers\Institute;

use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $academic_id = Auth::user()->academic_id;
        $student = Student::all();
        $academic_year = AcademicYear::pluck('year_title', 'id');
        //  return $academic_year;
        return view('institute.dashboard', compact('academic_year'));
    }

    // public function filter(Request $request)
    // {
    //     $starting_date = $request->starting_date;
    //     $ending_date   = $request->ending_date;
    //     $student       = Student::whereDate('academic_year_id', '>=', $starting_date)
    //         ->whereDate('academic_year_id', '<=', $ending_date)
    //         ->get();
    //     return view('dashboard', compact('student'));
    // }

    // public function filter(Request $request)
    // {

    //     // $starting_date = $request->starting_date;
    //     // $ending_date   = $request->ending_date;

    //     // // Assuming 'academic_year_id' is a date field, use whereBetween for filtering within the date range
    //     // $students = Student::with(['SchoolClass', 'Section'])
    //     //     ->whereBetween('academic_year_id', [$starting_date, $ending_date])
    //     //     ->get();
    //     // dd($students);

    //     // return view('institute.dashboard');
    // }
}