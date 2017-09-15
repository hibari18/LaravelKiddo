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
        if(isset($_POST['btnAdd']))
        {
            $fname=$_POST['txtFname'];
            $lname=$_POST['txtLname'];
            $mname=$_POST['txtMname'];
            $bday=$_POST['txtBday'];
            $bplace=$_POST['txtBplace'];
            $gender=$_POST['optradio'];
            $add=$_POST['txtAdd'];
            $no=$_POST['txtNo'];
            $email=$_POST['txtEmail'];
            $position=$_POST['selPosition'];

            $fac = Faculty::where('tblFacultyFlag', 1)->pluck('tblFacultyId')->all();
            if($fac->num_rows == 0)
            {   
                $zero = (string) "0000";
                $id=(string)"1";
            }
            else
            {
                $id = Faculty::groupBy('tblFacultyId', 'desc')->pluck('tblFacultyId')->first();
                $id +=1;
                $lId=(string) strlen($id);
                if($lId==1)
                {
                    $zero=(string)"0000";
                }else if($lId==2)
                {
                    $zero=(string)"000";
                }else if($lId==3)
                {
                    $zero=(string)"00";
                }else if($lId==4)
                {
                    $zero=(string)"0";
                }else if($lId==5)
                {
                    $zero=(string)"";
                }
            }
            $format='%s%d';
            $realid = sprintf($format,$zero,$id);
            
            // User
                $posName= Faculty::select('tblFacultyPosName')->where('tblFacultyPosId', $position)->first();
                $roleid= Role::select('tblRoleId')->where('tblRoleName', $posname)->first();

                $query = "select * from tbluser order by tblUserId desc limit 0, 1";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                $userId = $row['tblUserId'];
                $userId ++;
                $fullname=$fname.$lname;
                $query="insert into tbluser(tblUserId, tblUserName, tblUser_tblRoleId, tblUserFlag) values ('$userId', '$fullname', '$roleid', 1)";
                $result=mysqli_query($con, $query);
            // User end

            $query="insert into tblfaculty(tblFacultyId, tblFacultyFname, tblFacultyLname, tblFacultyMname, tblFacultyGender, tblFacultyEmail, tblFacultyFlag, tblFaculty_tblFacultyPositionId, tblFacultyContact, tblFacultyAddress, tblFacultyBday, tblFacultyBplace, tblFaculty_tblUserId) values ('$realid', '$fname', '$lname', '$mname', '$gender', '$email', 1, '$position', '$no', '$add', '$bday', '$bplace', '$userId')";
            if (!$query = mysqli_query($con, $query)) {
                exit(mysqli_error($con));
            }else{
                header('location:faculty-add.php');
            }
        }


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
