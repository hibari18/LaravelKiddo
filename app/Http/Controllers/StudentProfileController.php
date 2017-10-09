<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\PersonalInfo;
use DB;
use App\FamilyInfo;
use App\HealthInfo;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studprofile = Student::where('tblStudentFlag', 1)->get();
        $facprofile = Faculty::where('tblFacultyFlag', 1)->get();

        $name = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1"));
        //var_dump($name);
        $pinfo = PersonalInfo::where('tblStudInfoFlag', 1)->get();
        $finfo = FamilyInfo::where('tblParentFlag', 1)->get();
        $hinfo = HealthInfo::where('tblStudHealthFlag', 1)->get();
        
        return view('profile.index', compact('studprofile','facprofile', 'name', 'pinfo', '$finfo','hinfo'));

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
        
      // if(isset($_POST['btnStud']))
      // {
      //   $id = $_POST['txtStudId'];
      //   $query="select s.tblStudentFname, s.tblStudentLname, s.tblStudentMname, si.tblStudInfoBday, si.tblStudInfoBplace, si.tblStudInfoAddress, si.tblStudInfoGender from tblstudent s, tblstudentinfo si where s.tblStudentId = '$id' and s.tblStudentId = si.tblStudInfo_tblStudentId and s.tblStudentFlag = 1";
      //   $result = mysqli_query($con, $query);
      //   $row = mysqli_fetch_array($result);
      //   $fname = $row['tblStudentFname'];
      //   $lname = $row['tblStudentLname'];
      //   $mname = $row['tblStudentMname'];
      //   $bday = $row['tblStudInfoBday'];
      //   $bplace = $row['tblStudInfoBplace'];
      //   $add = $row['tblStudInfoAddress'];
      //   $gender = $row['tblStudInfoGender'];
      //   $arrStud = array($fname, $lname, $mname, $bday, $bplace, $gender, $add);
        
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
