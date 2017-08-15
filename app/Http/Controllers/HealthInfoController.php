<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $stepfour = HealthInfo::create([
            // tblStudHealth_tblStudentId ????
            'tblStudHealthAllergies' => trim($request->txtHealthAllergies),
            'tblStudHealthIllness' => trim($request->txtHealthIllness),
            'tblStudHealthMedication' => trim($request->txtHealthMeds),
            'tblStudHealthBloodType' => trim($request->txtHealthBtype),
            //radiobutton h2 what do i do
            'tblStudHealthReason' => trim($request->txtHealthReason),
            //radiobutton r1 what do i do
            'tblStudHealthDoctor' => trim($request->txtHealthDoctor),
            'tblStudHealthHospital' => trim($request->txtHealthHospital),
            'tblStudHealthHospitalNo' => trim($request->txtHealthHosNum),
            'tblStudHealthHospAddBldg' => trim($request->txtHealthAddBldg),
            'tblStudHealthHospAddSt' => trim($request->txtHealthAddSt),
            'tblStudHealthHospAddBrgy' => trim($request->txtHealthAddBrgy),
            'tblStudHealthHospAddCity' => trim($request->txtHealthAddCity),
            'tblStudHealthHospAddCountry' => trim($request->txtHealthAddCountry),
        ]);
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
