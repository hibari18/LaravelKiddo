<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DismissWithdraw;
use DB;
use App\Student;
use App\PersonalInfo;
use App\Level;

class DismissWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diswiths = DismissWithdraw::where('tblStudDismissFlag', 1)->get();
        $studprofile = Student::where('tblStudentFlag', 1)->get();
        $studinfo = PersonalInfo::where('tblStudInfoFlag', 1)->get();
        $level = Level::where('tblLevelFlag', 1)->get();


        $dwname = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, l.tblLevelName from tblstudent s, tblstudentinfo si, tbllevel l where s.tblStudent_tblLevelId=l.tblLevelId and si.tblStudInfo_tblStudentId=s.tblStudentId and s.tblStudentFlag=1 and s.tblStudentType != 'DISMISS' and s.tblStudentType != 'WITHDRAW' group by s.tblStudentId"));

        return view('dismisswithdraw.diswith', compact('diswiths','dwname','studprofile', 'studinfo','level'));

        
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

        $studid = $_POST['txtStudId'];
        $action = $_POST['selChoose'];
        //$reason = $_POST['taReason'];

        Student::where('tblStudentId', $studid)->update(['tblStudentType'=> $action]);

        $dwid = DismissWithdraw::orderBy('tblStudDismissId', 'desc')->pluck('tblStudDismissId')->first();
        $dwid ++;
        
        $dwid = DismissWithdraw::create([ 
            'tblStudDismissId' => $dwid,
            'tblStudDismissAction' => $action,
            'tblStudDismissReason' => trim($request->taReason),
            'tblStudDismiss_tblStudentId' => $studid,
        ]);

        $message = 4;

        return redirect()->route('dismisswithdraw.index')->with('message', $message);
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
