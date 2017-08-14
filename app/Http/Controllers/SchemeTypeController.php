<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\SchemeType;

class SchemeTypeController extends Controller
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

        return view('payment.index', compact('fees','schemetypes'));

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
        $schemetype = SchemeType::create([
            'tblScheme_tblFeeId' => trim($request->selAddSchemeFee),
            'tblSchemeType' => strtoupper(trim($request->txtAddScheme)),
            'tblSchemeNoOfPayment' => trim($request->txtAddSchemeNo),
        ]);

        $message = $schemetype ? 2 : 1;
        
        return redirect()->route('fees.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $schemetype = SchemeType::findOrFail($request->txtUpdSchemeId);
        $message = $schemetype->update([
            'tblSchemeType' => strtoupper(trim($request->txtUpdScheme)),
            'tblSchemeNoOfPayment' => strtoupper(trim($request->txtUpdSchemeNo)),

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
        $schemetype = SchemeType::findOrFail($request->txtDelScheme);
       
        $message = $schemetype->update(['tblSchemeFlag' => 0]) ? 6 : 5;
        return redirect()->route('payment.index')->with('message', $message);
    }
}
