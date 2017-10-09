<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use DB;
use App\User;

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
            $fname = preg_replace('/\s+/u', '',  $request->txtFname);
            $lname = preg_replace('/\s+/u', '',  $request->txtLname);
            $mname=  $request->txtMname;
            $bday=   $request->txtBday;
            $bplace=  $request->txtBplace;
            $gender=  $request->optradio;
            $add=  $request->txtAdd;
            $no=  $request->txtNo;
            $email=  $request->txtEmail;
            $position=  $request->selPosition;

            
            $faculty = DB::select(DB::raw("select * from tblfaculty;"));
            if(empty($faculty))
            {   
                $zero = (string) "0000";
                $id=(string)"1";
            }
            else
            {
                $id = Faculty::orderBy('tblFacultyId', 'desc')->pluck('tblFacultyId')->first();
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
                $userId = User::orderBy('tblUserId', 'desc')->pluck('tblUserId')->first();
                $userId ++;
                $fullname= $fname.$lname;
                $user = User::create([
                        'tblUserId' => $userId,
                        'tblUserName' => $fullname,
                        'tblUserFlag' => 1,

                ]);
            // User end
                
                $facultycreate = Faculty::create([
                        'tblFacultyId' => $realid,
                        'tblFacultyFname' => $fname,
                        'tblFacultyLname' => $lname,
                        'tblFacultyMname' => $mname,
                        'tblFacultyGender' => $gender,
                        'tblFacultyEmail' => $email,
                        'tblFacultyFlag' => 1,
                        'tblFacultyPosition' => $position,
                        'tblFacultyContact' => $no,
                        'tblFacultyAddress' => $add,
                        'tblFacultyBday' => $bday,
                        'tblFacultyBplace' => $bplace,
                        'tblFaculty_tblUserId' => $userId,

                ]);
        
        $message = 2;
        return redirect()->route('profile.index')->with('message', $message);

           
        }
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
    public function edit(Request $request, $id)
    {
        $faculty = Faculty::where('tblFacultyId', $request->txtFacultyId)->where('tblFacultyFlag', 1)->first();
        return view('profile.facultyedit', compact('faculty'));
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
      if(isset($_POST['btnUpd']))
        {
            $id= $request->txtId;
            $fname= $request->txtFname;
            $lname= $request->txtLname;
            $mname= $request->txtMname;
            $bday= $request->txtBday;
            $bplace= $request->txtBplace;
            $gender= $request->optradio;
            $add= $request->txtAdd;
            $no= $request->txtNo;
            $email= $request->txtEmail;
            $position= $request->selPosition;

            $facultyupdate = Faculty::where('tblFacultyId', $id)->update([
                        'tblFacultyFname' => $fname,
                        'tblFacultyLname' => $lname,
                        'tblFacultyMname' => $mname,
                        'tblFacultyGender' => $gender,
                        'tblFacultyEmail' => $email,
                        'tblFacultyFlag' => 1,
                        'tblFacultyPosition' => $position,
                        'tblFacultyContact' => $no,
                        'tblFacultyAddress' => $add,
                        'tblFacultyBday' => $bday,
                        'tblFacultyBplace' => $bplace,
                        // 'tblFaculty_tblUserId' => $userId,

                ]);

        }
        $message = 4;
        return redirect()->route('profile.index')->with('message', $message);
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
