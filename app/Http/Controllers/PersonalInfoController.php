<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
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
        $steptwo = PersonalInfo::create([
            // tblStudInfo_tblStudentId - what do i do with this
            'tblStudInfoFname' => trim($request->txtStudFname),
            'tblStudInfoLname' => trim($request->txtStudLname),
            'tblStudInfoMname' => trim($request->txtStudMname),
            'tblStudInfoBday' => trim($request->txtStudBday),
            'tblStudInfoBplace' => trim($request->txtStudBplace),
            'tblStudInfoNationality' => trim($request->txtStudNat),
            'tblStudInfoReligion' => trim($request->txtStudReligion),
            'tblStudInfoAddBldg' => trim($request->txtStudAddBldg),
            'tblStudInfoAddSt' => trim($request->txtStudAddSt),
            'tblStudInfoAddBrgy' => trim($request->txtStudAddBrgy),
            'tblStudInfoAddCity' => trim($request->txtStudAddCity),
            'tblStudInfoAddCountry' => trim($request->txtStudAddCountry),
            'tblStudInfoLang1' => trim($request->txtStudLang1),
            'tblStudInfoLang2' => trim($request->txtStudLang2),
        ]);

        return;
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
