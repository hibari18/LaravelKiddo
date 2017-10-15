<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Fees;
use App\SchemeType;
use App\FeeAmount;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('mass')){

            $schedules = 
                Schedule::leftjoin('tblscheme', 'tblSchemeDetail.tblSchemeDetail_tblScheme', '=', 'tblScheme.tblSchemeId')
                ->leftjoin('tblFee', 'tblSchemeDetail.tblSchemeDetail_tblFee', '=', 'tblFee.tblFeeId')
                ->where('tblFee.tblFeeFlag', 1)
                ->where('tblFee.tblFeeType', 'MASS FEE')
                ->get();
            return view('payment.table.schedule', compact('schedules'));
        } else {
            $schedules = 
                \DB::table('tblSchemeDetail')
                ->select('*')
                ->leftjoin('tblscheme', 'tblSchemeDetail.tblSchemeDetail_tblScheme', '=', 'tblScheme.tblSchemeId')
                ->where('tblSchemeDetail.tblSchemeDetail_tblLevel',$request->level)
                ->leftjoin('tblFee', 'tblSchemeDetail.tblSchemeDetail_tblFee', '=', 'tblFee.tblFeeId')
                ->where('tblFee.tblFeeFlag', 1)
                ->where('tblFee.tblFeeType', 'DIFFERENT PER LEVEL')
                ->get();
                //dd($schedules);
            return view('payment.table.schedule', compact('schedules'));
        }
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
        $schedule = Schedule::findOrFail($request->txtDetId);

        $message = $schedule->update([
            'tblSchemeDetailDueDate' => trim($request->txtDetDueDate),
            'tblSchemeDetailAmount' => trim($request->txtDetAmount),
            
        ]) ? 4 : 3;

        // update fee amount
        $fee = Fees::findOrFail($schedule->tblSchemeDetail_tblFee);
        FeeAmount::updateOrCreate([
            'tblFeeAmount_tblLevelId'   => $schedule->tblSchemeDetail_tblLevel,
            'tblFeeAmount_tblFeeId'     => $schedule->tblSchemeDetail_tblFee,
        ],[
            'tblFeeAmountAmount'        => $fee->total_amount($schedule->tblSchemeDetail_tblLevel),
        ]);


        return redirect()->route('fees.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $schedules = Schedule::findOrFail($request->txtDetDelId);
        
        $message = $schedules->update([
            'tblSchemeDetailDueDate' => null,
            'tblSchemeDetailAmount' => null,
            
        ]) ? 4 : 3;

        return redirect()->route('fees.index')->with('message', $message);
    }
}
