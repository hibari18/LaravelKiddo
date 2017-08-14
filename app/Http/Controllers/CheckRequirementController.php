<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckRequirement;
use App\PersonalInfo;
use App\FamilyInfo;
use App\HealthInfo;
use App\Level;
use App\Requirement;

class CheckRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stepone = CheckRequirement::where('tblStudReqFlag', 1)->get();
        $steptwo = PersonalInfo::where('tblStudInfoFlag', 1)->get();
        $stepthree = FamilyInfo::where('tblParentFlag', 1)->get();
        $stepfour = HealthInfo::where('tblStudHealthFlag', 1)->get();
        $levels = Level::where('tblLevelFlag', 1)->get();
        $requirements = Requirement::where('tblRequirementFlag', 1)->get();


        return view('admission.index', compact('stepone', 'steptwo', 'stepthree','stepfour','levels','requirements'));
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
