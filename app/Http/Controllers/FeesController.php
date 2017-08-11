<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\SchemeType;
use App\Schedule;
use App\FeeDetails;
use App\Level;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fees::where('tblFeeFlag', 1)->get();
        $schemetypes = SchemeType::where('tblSchemeFlag', 1)->get();
        $schedules = Schedule::where('tblSchemeDetailFlag', 1)->get();
        $feedetails = FeeDetails::where('tblFeeDetailFlag', 1)->get();
        $levels = Level::where('tblLevelFlag', 1)->get();

        return view('payment.index', compact('fees','schemetypes','schedules','feedetails','levels'));
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
        $fees = Fee::where('tblFeeAmount_tblLevelId', $id)->where('tblFeeFlag', 1)->get();
        
        return view('payment.table.fees', compact('fees'));
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

