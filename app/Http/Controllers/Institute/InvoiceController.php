<?php

namespace App\Http\Controllers\Institute;

use App\Models\Invoice;
use App\Models\Section;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeeType;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institute_id = auth()->user()->institute_id;
        $invoices = Invoice::where('institute_id', $institute_id)
            ->with('SchoolClass', 'Section', 'FeeType', 'Student')
            ->get();
        return view("institute.invoices.index", compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $invoice = Invoice::get();
        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $fee_types = FeeType::pluck('fee_type', 'id');
        $students = Student::pluck('name', 'id');
        return view("institute.invoices.create", compact('classes', 'sections', 'fee_types', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $invoice = new Invoice;
        $invoice->date      = $request->date;
        $invoice->amount    = $request->amount;
        $invoice->remarks   = $request->remarks;
        $invoice->status    = $request->status;
        $invoice->status    = $request->status;
        $invoice->class_id  = $request->class_id;
        $invoice->section_id = $request->section_id;
        $invoice->student_id = $request->student_id;
        $invoice->fee_type_id = $request->fee_type_id;
        $invoice->institute_id = Auth::user()->id;
        $invoice->save();

        return redirect('institute/invoice' )->with('success', 'Invoice Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //return 'id';
        $invoice = Invoice::find($id);
        return view('institute.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $classes = SchoolClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $fee_types = FeeType::pluck('fee_type', 'id');
        $students = Student::pluck('name', 'id');
        return view("institute.invoices.edit", compact('invoice', 'classes', 'sections', 'fee_types', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $request;
        $invoice = Invoice::find($id);
        $invoice->date       = $request->date;
        $invoice->amount     = $request->amount;
        $invoice->remarks    = $request->remarks;
        $invoice->status     = $request->status;
        $invoice->class_id   = $request->class_id;
        $invoice->section_id = $request->section_id;
        $invoice->student_id = $request->student_id;
        $invoice->fee_type_id = $request->fee_type_id;
        $invoice->update();

        return redirect('institute/invoice')->with('success', 'Invoice Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('institute/invoice')->with('Success', 'Invoice Successfully Deleted');
    }
}