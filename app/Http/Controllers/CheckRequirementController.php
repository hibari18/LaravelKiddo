<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckRequirement;
use App\PersonalInfo;
use App\FamilyInfo;
use App\HealthInfo;
use App\Level;
use App\Requirement;
use App\SchoolYear;
use App\Student;

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
        $schoolyear = SchoolYear::where('tblSchoolYearFlag', 1)->get();
        $student = Student::where('tblStudentFlag', 1)->get();


        return view('admission.index', compact('stepone', 'steptwo', 'stepthree','stepfour','levels','requirements','schoolyear','student'));
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
        $stepone = CheckRequirement::create([

        //student id
        $sy = substr(SchoolYear::select('tblSchoolYrStart')->where('tblSchoolYrActive', 'Active')->first()->tblSchoolYrStart, 2);
        $studId = substr(Student::select('tblStudentId')->whereRaw('left(tblStudentId, 2) ='.$sy)->groupBy('tblStudentId')->orderBy('tblStudentId', 'desc')->first()->tblStudentID, 3);    
            if(empty($studId)) { 
                $studId='001';
                 } 
            else { 
                $studId++;
                 } 
        $id = sprintf('%03d', $studId); 
        $studentid=$sy.$id;

        

        'tblStudentId' => $studentid,
        'tblStudentType' => 'OFFICIAL',
        'tblStudent_tblLevelId' => trim($request->selLevel),
        'tblStudentTransferee' => trim($request->r3),
        //automatic ba na magwa1 na yung flag nito????



        ]);//end
        
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
