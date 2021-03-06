<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Division;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::where('tblDivisionFlag', 1)->get();
        $level = Level::where('tblLevelFlag', 1)->get();
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
        $duplicate = Level::where('tblLevelName', $request->txtAddLvl)->first();
        if($duplicate){
            if($duplicate->tblLevelFlag==1)
                return redirect()->route('division.index')->with('message', 10);
            $duplicate->tblLevelFlag = 1;
            $duplicate->save();
            return redirect()->route('division.index')->with('message', 2);
        }

        $level = Level::create([
            'tblLevelName' => strtoupper(trim($request->txtAddLvl)),
            'tblLevel_tblDivisionId' => trim($request->selAddLvlDiv),
            ]);
        $message = $level ? 2 : 1;

        return redirect()->route('division.index')->with('message', $message);
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
       
        $level = Level::findOrFail($request->txtUpdLvlId);
        $divID = Division::where('tblDivisionName', $request->selUpdLvlDiv)->first()->tblDivisionId;
        
        if(Level::where('tblLevelName', $request->txtUpdLvl)->where('tblLevelId','!=', $level->tblLevelId)->where('tblLevelFlag', 1) ->first() == null){

        $message = $level->update([
            'tblLevelName' => strtoupper(trim($request->txtUpdLvl)),
            'tblLevel_tblDivisionId' => $divID,
        ]) ? 4 : 3;
        
        }

        else {
        $message = 3;
        return redirect()->route('division.index')->with('message', $message);
        
        }
        return redirect()->route('division.index')->with('message', $message);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $level = Level::findOrFail($request->txtDelLvlId);
        /* 
         * [todo] 
         * SchemeDetail Model
         * FeeDetail Model
         * level relationship
         *
            if($level->curriculum_details->where('tblCurriculumFlag','0')->count() > 0 || $level->scheme_details->where('tblSchemeDetailFlag','0')->count() > 0 || $level->fee_details->where('tblFeeDetailFlag','0')->count() > 0){
            return redirect()->route('curriculum.index')->with('message', 7);
            }
        */
        if($level->curriculum_details->where('tblDetailsFlag','0')->count() > 0){
            return redirect()->route('curriculum.index')->with('message', 7);
        }
        $message = $level->update(['tblLevelFlag' => 0]) ? 6 : 5;
        return redirect()->route('division.index')->with('message', $message);
    }
}
