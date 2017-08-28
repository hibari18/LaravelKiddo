<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class FacultyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facprofile = Faculty::where('tblFacultyFlag', 1)->get();

        return view('profile.facultyprofile', compact('facprofile'));
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
        $facprofile = Faculty::create([
            
            //'tblFacultyId' => $studentid,
            'tblFacultyFname' => trim($request->txtFname),
            'tblFacultyLname' => trim($request->txtLname),
            'tblFacultyMname' => trim($request->txtMname),
            'tblFacultyBplace' => trim($request->txtBplace),
            'tblFacultyBday' => trim($request->txtBday),
            'tblFacultyGender' => trim($request->optradio),
            'tblFacultyAddress' => trim($request->txtAdd),
            //'tblFaculty_tblUserId' => trim($request->txtStudNat),
            'tblFacultyContact' => trim($request->txtNo),
            'tblFacultyEmail' => trim($request->txtEmail),
            'tblFacultyPosition' => trim($request->selPosition),
            
        
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
