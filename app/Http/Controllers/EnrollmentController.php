<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrollment;
use App\SchemeType;
use App\Level;
use App\StudScheme;
use App\SchoolYear;
use App\Fees;
use App\Account;
use App\FeeAmount;
use App\Schedule;
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

        // $query1 = DB::select(DB::raw("select * from tblScheme where tblScheme_tblFeeId='$id' and tblSchemeFlag=1"));
        // $query2 = DB::select(DB::raw("select * from tblfee where tblFeeId='$val' and tblFeeMandatory='N' and tblFeeFlag=1 group by tblFeeId"));
        $man = DB::select(DB::raw("select * from tblfee where tblFeeMandatory='Y' and tblFeeFlag=1"));
        $opt = DB::select(DB::raw("select * from tblfee where tblFeeMandatory='N' and tblFeeFlag=1"));

        return view('enrollment.enrollment', compact('levels','student', 'enroll','scheme','studschemes', 'enname', 'enname2', 'fees', 'man', 'opt'));
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
        // dd($request->all());
        
        $studid = $request->txtStudId;
        $clear = $request->txtClear;
        $session = $request->txtSession;
        $schemem = $request->selSchemeMand ?: [];
        $schemeo = $request->selSchemeOpt ?: [];
        $optional_fees  = $request->txtFeeIdO ?: [];
        $mandatory_fees = $request->txtFeeIdM ?: [];

        try{
            \DB::beginTransaction();

            $syid   =   SchoolYear::select('tblSchoolYrId')->where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1)->first()->tblSchoolYrId;
            
            $enrollid = Enrollment::create([
                'tblStudEnrollPreferedSession' => $session,
                'tblStudEnrollClearance' => $clear,
                'tblStudEnroll_tblStudentId' => $studid,
            ]);

            $length1=count($schemem);
            foreach($mandatory_fees as $feeId)
            {
                $scheme = array_key_exists($feeId, $schemem)?$schemem[$feeId]:null;
                $studschemeid = StudScheme::create([
                    'tblStudScheme_tblSchemeId' => $scheme, 
                    'tblStudScheme_tblFeeId' => $feeId,
                    'tblStudScheme_tblStudentId' => $studid,
                    'tblStudScheme_tblSchoolYrId' => $syid,
                ]);
            }//foreach feeId(mandatory)
            

            $length=count($schemeo);
            foreach($optional_fees as $feeId)
            {
                $scheme = array_key_exists($feeId, $schemeo)?$schemeo[$feeId]:null;
                $studschemeid = StudScheme::create([
                    'tblStudScheme_tblSchemeId' => $scheme, 
                    'tblStudScheme_tblFeeId' => $feeId,
                    'tblStudScheme_tblStudentId' => $studid,
                    'tblStudScheme_tblSchoolYrId' => $syid,
                ]);
            }//foreach feeId(optional)
            //dd($studid);
            $stscheme = StudScheme::where('tblStudScheme_tblStudentId', $studid)->where('tblStudScheme_tblSchoolYrId', $syid)->where('tblStudSchemeFlag', 1)->get();
            $student = Student::findOrFail($studid);
            $lvlid = $student->tblStudent_tblLevelId;
                foreach ($stscheme as $row) {
                    $studscheme=$row->tblStudSchemeId;
                    $schemeId=$row->tblStudScheme_tblSchemeId;
                    $studfeeid=$row->tblStudScheme_tblFeeId;
                    if($schemeId != null)
                    {
                        $schemedetail = Schedule::where('tblSchemeDetail_tblScheme', $schemeId)->where('tblSchemeDetail_tblLevel', $lvlid)->where('tblSchemeDetailFlag', 1)->get();
                        foreach($schemedetail as $row3)
                        {
                            $duedate=$row3->tblSchemeDetailDueDate;
                            $payment=$row3->tblSchemeDetailAmount;
                            $paymentnum=$row3->tblSchedDetailCtr;
                            $acc = Account::create([
                                    'tblAcc_tblStudentId' => $studid,
                                    'tblAcc_tblStudSchemeId' => $studscheme,
                                    'tblAccCredit' => $payment,
                                    'tblAccDueDate' => $duedate,
                                    'tblAccPaymentNum' => $paymentnum,
                                    'tblAccRunningBal' => $payment,

                            ]);
                        }
                    }

                    else if(empty($schemeId))
                    {
                        $famount = FeeAmount::where('tblFeeAmount_tblFeeId', $studfeeid)->where('tblFeeAmountFlag', 1)->where('tblFeeAmount_tblLevelId', $lvlid)->first();
                        $sched = Schedule::where('tblSchemedetail_tblfee', $studfeeid)->first();
                        if($famount !== null){
                            $feeamnt = $sched->tblSchemeDetailAmount;
                            $accnt = Account::create([
                                'tblAcc_tblStudentId' => $studid,
                                'tblAcc_tblStudSchemeId' => $studscheme,
                                'tblAccCredit' => $feeamnt,
                                'tblAccDueDate' => $sched->tblSchemeDetailDueDate,
                                'tblAccPaymentNum' => 1,
                                'tblAccRunningBal' => $feeamnt,
                            ]);
                        }
                        
                    }
                    
                }
                    
            \DB::commit();
                        
            $student = Student::where('tblStudentId', $studid)->where('tblStudentFlag', 1)->first();
            $student->update(['tblStudentType'=> 'OFFICIAL']);
            
            $lvlid= $student->tblStudent_tblLevelId;
            $syid = Schoolyear::where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1)->first()->tblSchoolYrId;
                
            return view('enrollment.collection', compact('student', 'lvlid', 'syid'));

        } catch(QueryException $e){
            \DB::rollback();
        }
        
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
        $enname = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='APPLICANT' and s.tblStudent_tblLevelId='${id}'"));

        return view('enrollment.table.studlist', compact('enname'));
    }

    public function proceed(Request $request){
        if(isset($_POST['btnProceed']))
        {
          $studid = $request->txtStudentId;
          $clear= $request->chkClear;
          $session= $request->selSession;
          $optfees= $request->optionalfees;

        }
        $enname2 = DB::select(DB::raw("select concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name from tblstudentinfo join tblstudent on tblstudent.tblStudentId=tblstudentinfo.tblStudInfo_tblStudentId where tblstudent.tblStudentId='$studid' and tblstudent.tblStudentFlag=1"));
        
        $query1 = []; //DB::select(DB::raw("select * from tblScheme where tblScheme_tblFeeId='$id' and tblSchemeFlag=1"));
        $query2 = []; //DB::select(DB::raw("select * from tblfee where tblFeeId='$val' and tblFeeMandatory='N' and tblFeeFlag=1 group by tblFeeId"));
        
        $man = Fees::where('tblFeeMandatory','Y')->where('tblFeeFlag','1')->get();
        $opt = Fees::where('tblFeeMandatory','N')->where('tblFeeFlag','1')->whereIn('tblFeeId', $request->optionalfees ?: [])->get();

        return view('enrollment.enrollscheme', compact('studid','clear', 'session','optfees', 'enname2', 'query1', 'query2', 'man', 'opt'));
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
