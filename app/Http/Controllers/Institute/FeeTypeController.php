<?php

namespace App\Http\Controllers\Institute;

use id;
use App\Models\FeeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feetypes = FeeType::get();
        return view("institute.fee.index", compact('feetypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feeType = FeeType::get();
        return view("institute.fee.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $fee_Type = new FeeType;
        $fee_Type->fee_type = $request->fee_type;
        $fee_Type->amount   = $request->amount;
        $fee_Type->remarks  = $request->remarks;
        $fee_Type->status = $request->status;
        $fee_Type->institute_id = Auth::user()->id;
        $fee_Type->save();

        return redirect('institute/fee')->with('success', 'Fee Type Successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fee_Type = FeeType::find($id);
        return view('institute.fee.show', compact('fee_Type'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feetype = FeeType::find($id);
        return view('institute.fee.edit', compact('feetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $fee_Type = FeeType::find($id);
        $fee_Type->fee_type = $request->fee_type;
        $fee_Type->amount   = $request->amount;
        $fee_Type->remarks  = $request->remarks;
        $fee_Type->status = $request->status;
        $fee_Type->update();

        return redirect('institute/fee-type')->with('success', 'Fee Type Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fee_Type = FeeType::find($id);
        $fee_Type->delete();
        return redirect('institute/fee-type')->with('success', 'Fee Type Successfully Deleted');
    }
}
