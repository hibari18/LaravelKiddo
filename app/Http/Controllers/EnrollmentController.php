<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrollment;
use App\SchemeType;
use App\Level;
use App\StudScheme;
use App\Fees;
use DB;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::where('tblLevelFlag', 1)->get();
        $student = Student::where('tblStudentFlag', 1)->get();
        $enroll = Enrollment::where('tblStudEnrollFlag', 1)->get();
        $scheme = SchemeType::where('tblSchemeFlag', 1)->get();
        $studschemes = StudScheme::where('tblStudSchemeFlag', 1)->get();
        $fees = Fees::where('tblFeeFlag', 1)->get();
        $enname = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='APPLICANT' or s.tblStudentType='OLD STUDENT'"));
        $enname2 = [];
        $query1 = DB::select(DB::raw("select * from tblScheme where tblScheme_tblFeeId='$id' and tblSchemeFlag=1"));
        $query2 = DB::select(DB::raw("select * from tblfee where tblFeeId='$val' and tblFeeMandatory='N' and tblFeeFlag=1 group by tblFeeId"));
        $man = DB::select(DB::raw("select * from tblfee where tblFeeMandatory='Y' and tblFeeFlag=1"));
        $opt = DB::select(DB::raw("select * from tblfee where tblFeeMandatory='N' and tblFeeFlag=1"));

        return view('enrollment.enrollment', compact('levels','student', 'enroll','scheme','studschemes', 'enname', 'enname2', 'fees', 'man', 'opt','query1', 'query2'));
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
        if(isset($requst->btnProceed))
        {
            $studid = $requst->txtStudId;
            $clear=$requst->txtClear;
            $session=$requst->txtSession;
            $schemem=$requst->selSchemeMand;
            $schemeo=$requst->selSchemeOpt;
            $feeId=$requst->txtFeeId2;
            $feeId=$requst->txtFeeId1;

            $syid=SchoolYear::select('tblSchoolYrId')->where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1);

            $enrollid = Enrollment::orderBy('tblStudEnrollId','desc')->pluck('tblStudEnrollId')->first();
            $enrollid++;
            $enrollid = Enrollment::create([
                        'tblStudEnrollId' => $enrollid,
                        'tblStudEnrollPreferedSession' => $session,
                        'tblStudEnrollClearance' => $clear,
                        'tblStudEnroll_tblStudentId' => $studid,

                ]);

            $length1=count($schemem);
            foreach($feeId1 as $val1)
            {
                for($i=0; $i<$length1; $i++)
                {
                    $scheme1=$schemem[$i];
                    $result= SchemeType::where('tblScheme_tblFeeId', $val1)->where('tblSchemeId', $scheme1)->where('tblSchemeFlag', 1)->get();
                    if(count($result) > 0)
                    {

                        $studschemeid = StudScheme::orderBy('tblStudSchemeId', 'desc')->pluck('tblStudSchemeId')->first();
                        $studschemeid++;
                        $studschemeid = StudScheme::create([
                                        'tblStudSchemeId' => $studschemeid,
                                        'tblStudScheme_tblSchemeId' => $scheme1,
                                        'tblStudScheme_tblFeeId' => $val1,
                                        'tblStudScheme_tblStudentId' => $studid,
                                        'tblStudScheme_tblSchoolYrId' => $syid,

                            ]);

                    }
                    else if(count($result) == 0)
                    {

                        $studschemeid = StudScheme::orderBy('tblStudSchemeId','desc')->pluck('tblStudSchemeId')->first();
                        $studschemeid++;
                        $studschemeid = StudScheme::create([
                                        'tblStudSchemeId' => $studschemeid,
                                        'tblStudScheme_tblFeeId' => $val1,
                                        'tblStudScheme_tblStudentId' => $studid,
                                        'tblStudScheme_tblSchoolYrId' => $syid,

                            ]);

                    }
                }
            }//foreach feeId(mandatory)
            $length=count($schemeo);
            foreach($feeId as $val2)
            {
                for($i=0; $i<$length; $i++)
                {
                    $scheme=$schemeo[$i];
                    $result = SchemeType::where('tblScheme_tblFeeId', $val2)->where('tblSchemeId', $scheme)->where('tblSchemeFlag', 1);
                    if(count($result) > 0)
                    {

                        $studschemeid = StudScheme::orderBy('tblStudSchemeId', 'desc')->pluck('tblStudSchemeId')->first();
                        $studschemeid++;
                        $studschemeid = StudScheme::create([
                                        'tblStudSchemeId' => $studschemeid,
                                        'tblStudScheme_tblSchemeId' => $scheme,
                                        'tblStudScheme_tblFeeId' => $val2,
                                        'tblStudScheme_tblStudentId' => $studid,
                                        'tblStudScheme_tblSchoolYrId' => $syid,

                            ]);

                    }
                    else if(count($result) == 0)
                    {

                        $studschemeid = StudScheme::orderBy('tblStudSchemeId', 'desc')->pluck('tblStudSchemeId')->first();
                        $studschemeid++;
                        $studschemeid = StudScheme::create([
                                        'tblStudSchemeId' => $studschemeid,
                                        'tblStudScheme_tblFeeId' => $val2,
                                        'tblStudScheme_tblStudentId' => $studid,
                                        'tblStudScheme_tblSchoolYrId' => $syid,

                            ]);

                    }
                }
            }//foreach feeId(optional)
            Student::where('tblStudentId', $studid)->where( 'tblStudentFlag', 1)->update(['tblStudentType'=> 'OFFICIAL']);

        }//btnProceed

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enname = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='APPLICANT' and s.tblStudent_tblLevelId='${id}'"));

        return view('enrollment.table.studlist', compact('enname'));
    }

    public function proceed($id)

    {
        if(isset($_POST['btnProceed']))
        {
          $studid = $_POST['txtStudentId'];
          $clear=$_POST['chkClear'];
          $session=$_POST['selSession'];
          $optfees=$_POST['optionalfees'];

        }
        $enname2 = DB::select(DB::raw("select concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name from tblstudentinfo join tblstudent on tblstudent.tblStudentId=tblstudentinfo.tblStudInfo_tblStudentId where tblstudent.tblStudentId='$studid' and tblstudent.tblStudentFlag=1"));

        return view('enrollment.enrollscheme', compact('studid','clear', 'session','optfees', 'enname2'));
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
