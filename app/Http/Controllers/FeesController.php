<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\SchemeType;
use App\Schedule;
use App\FeeDetails;
use App\Level;
use App\FeeAmount;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = [];
        $fees_select = Fees::where('tblFeeFlag', 1)->get();
        $schemetypes = SchemeType::where('tblSchemeFlag', 1)->get();
        $schedules = [];
        $feedetails = FeeDetails::where('tblFeeDetailFlag', 1)->get();
        $levels = Level::where('tblLevelFlag', 1)->get();
        $amount = FeeAmount::where('tblFeeAmountFlag', 1)->get();

        return view('payment.index', compact('fees', 'fees_select','schemetypes','schedules','feedetails','levels','amount'));
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
        $duplicate = Fees::where('tblFeeCode', $request->txtAddFeeCode)->where('tblFeeName', $request->txtAddFeeName)->first();
        if($duplicate){
            if($duplicate->tblFeeFlag==1)
                return redirect()->route('fees.index')->with('message', 7);
            $duplicate->tblFeeFlag = 1;
            $duplicate->save();
            return redirect()->route('fees.index')->with('message', 2);
        }
        
        $fees = Fees::create([
            'tblFeeCode' => strtoupper(trim($request->txtAddFeeCode)),
            'tblFeeName' => strtoupper(trim($request->txtAddFeeName)),            
            'tblFeeMandatory' => trim($request->selAddFeeStatus),
            'tblFeeType' => trim($request->selAddFeeType),
        ]);
        
        $levels = Level::where('tblLevelFlag', 1)->get();
        foreach($levels as $level)
        {
            FeeAmount::create([
                'tblFeeAmount_tblFeeId' => $fees->tblFeeId,
                'tblFeeAmount_tblLevelId' => $level->tblLevelId,
            ]);
        }
        if($request->selAddFeeType == 'DIFFERENT PER LEVEL'){
            foreach($levels as $level){
                Schedule::firstOrCreate([
                    'tblSchemeDetail_tblFee' =>$fees->tblFeeId,
                    'tblSchemeDetail_tblLevel' =>$level->tblLevelId,
                    'tblSchedDetailCtr' => 1
                ]);
            }
        } else {
            Schedule::firstOrCreate([
                'tblSchemeDetail_tblFee' =>$fees->tblFeeId,
                'tblSchedDetailCtr' => 1
            ]);
        }

        $message = $fees ? 2 : 1;    

        return redirect()->route('fees.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $fees = FeeAmount::with('fees')->where('tblFeeAmount_tblLevelId', $id)->get();
        //dd($fees); 
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
        $fees = Fees::findOrFail($request->txtUpdFeeId);
        $message = $fees->update([
            'tblFeeCode' => strtoupper(trim($request->txtUpdFeeCode)),
            'tblFeeName' => strtoupper(trim($request->txtUpdFee)),
            'tblFeeMandatory' => trim($request->selUpdFeeStatus),
            'tblFeeType' => trim($request->selUpdFeeType),

        ]) ? 4 : 3;
        
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
        $fees = Fees::findOrFail($request->txtDelFee);
       
        $message = $fees->update(['tblFeeFlag' => 0]) ? 6 : 5;
        return redirect()->route('fees.index')->with('message', $message);
    }
}

