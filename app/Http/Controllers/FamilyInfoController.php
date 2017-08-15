<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyInfoController extends Controller
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
        $stepthree = FamilyInfo::create([
            //'tblParentRelation' => 'FATHER',
            'tblParentFname' => trim($request->txtFatherFname),
            'tblParentLname' => trim($request->txtFatherLname),
            'tblParentMname' => trim($request->txtFatherMname),
            'tblParentCpNo' => trim($request->txtFatherNum),
            'tblParentEmail' => trim($request->txtFatherEmail),
            'tblParentAddBldg' => trim($request->txtFatherAddBldg),
            'tblParentAddSt' => trim($request->txtFatherAddSt),
            'tblParentAddBrgy' => trim($request->txtFatherAddBrgy),
            'tblParentAddCity' => trim($request->txtFatherAddCity),
            'tblParentAddCountry' => trim($request->txtFatherAddCountry),
            'tblParentTelNo' => trim($request->txtFatherTelnum),
            'tblParentOccupation' => trim($request->txtFatherJob),
            'tblParentCompany' => trim($request->txtFatherCompany),
            'tblParentComAddBldg' => trim($request->txtFatherComAddBldg),
            'tblParentComAddSt' => trim($request->txtFatherComAddSt),
            'tblParentComAddBrgy' => trim($request->txtFatherComAddBrgy),
            'tblParentComAddCity' => trim($request->txtFatherComAddCity),
            'tblParentComAddCountry' => trim($request->txtFatherComAddCountry),
            'tblParentWorkNo' => trim($request->txtFatherComNum),

            'tblParentFname' => trim($request->txtMotherFname),
            'tblParentLname' => trim($request->txtMotherLname),
            'tblParentMname' => trim($request->txtMotherMname),
            'tblParentCpNo' => trim($request->txtMotherNum),
            'tblParentEmail' => trim($request->txtMotherEmail),
            'tblParentAddBldg' => trim($request->txtMotherAddBldg),
            'tblParentAddSt' => trim($request->txtMotherAddSt),
            'tblParentAddBrgy' => trim($request->txtMotherAddBrgy),
            'tblParentAddCity' => trim($request->txtMotherAddCity),
            'tblParentAddCountry' => trim($request->txtMotherAddCountry),
            'tblParentTelNo' => trim($request->txtMotherTelnum),
            'tblParentOccupation' => trim($request->txtMotherJob),
            'tblParentCompany' => trim($request->txtMotherCompany),
            'tblParentComAddBldg' => trim($request->txtMotherComAddBldg),
            'tblParentComAddSt' => trim($request->txtMotherComAddSt),
            'tblParentComAddBrgy' => trim($request->txtMotherComAddBrgy),
            'tblParentComAddCity' => trim($request->txtMotherComAddCity),
            'tblParentComAddCountry' => trim($request->txtMotherComAddCountry),
            'tblParentWorkNo' => trim($request->txtMotherComNum),

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
