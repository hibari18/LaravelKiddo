<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeDetails;
use App\Amount;
use App\Level;
use App\Fees;


class FeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $feedetails = FeeDetails::where('tblFeeDetailFlag', 1)->get();
        $feedetails = null;
        $levels = Level::where('tblLevelFlag', 1)->get();
        $amounts = Amount::where('tblFeeAmountFlag')->get();

        return view('payment.index', compact('feedetails','levels','amounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
     {
    //     $feedetails = Fees::where('tblFeeId', $id)->first()
    //         ->feedetails()->where('tblFeeDetailFlag', 1)->get();
        
        return view('payment.table.feedetail', compact('feedetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
