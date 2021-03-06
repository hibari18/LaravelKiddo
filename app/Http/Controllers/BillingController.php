<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SchoolYear;
use App\Student;
use App\Level;
use App\Account;
use App\Fees;
use App\StudScheme;


class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stud = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1;"));
        $levels = Level::where('tblLevelFlag', 1)->get();
        
        return view('billing.index', compact('stud', 'levels'));
        
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
        $or=$_POST['txtOR'];
        $id=$_POST['txtAccId'];
        $pr=$_POST['txtPR'];
        $i=0;
        foreach($id as $x)
        {
            $y=$or[$i];
            $z=$pr[$i];
            $datenow=date('Y-m-d');
            $acc = Account::where('tblAccId', $x)->where('tblAccFlag', 1)->first();
            
            $payment=$acc->tblAccCredit;
            $accountupdate = Account::where('tblAccId', $x)->where('tblAccFlag', 1)->update([
                                'tblAccOR' => $y,
                                'tblAccPR' => $z,
                                'tblAccPayment' => $payment,
                                'tblAccRunningBal' => null,
                                'tblAccPaid' => 'PAID',
                                'tblAccPaymentDate' => $datenow,

            ]);
            $i++;
        }

        $message = 4;
        return redirect()->route('billing.index')->with('message', $message);
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
        $studid= $request->txtStudId;

        $syid = SchoolYear::select('tblSchoolYrId')->where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1)->first()->tblSchoolYrId;
        
        $student = Student::where('tblStudentId', $request->txtStudId)->where('tblStudentFlag', 1)->first();
        $accounts = $student->accounts()
            ->leftJoin('tblStudScheme', 'tblAccount.tblAcc_tblStudSchemeId','tblStudScheme.tblStudSchemeId')
            ->where('tblStudScheme.tblStudScheme_tblSchoolYrId', $syid)
            ->where('tblAccPaid', '!=', 'PAID')
            ->groupBy('tblAccPaymentNum', 'tblAcc_tblStudSchemeId')
            ->get();


        $optionalFees = Fees::where('tblFeeMandatory','N')->where('tblFeeFlag','1')->get();

        return view('billing.billingmain', compact('syid', 'student', 'accounts', 'studid', 'optionalFees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function bills (Request $request)
    {
        $accounts = Account::whereIn('tblAccId', $request->chkbills)->where('tblAccFlag', 1)->get();
        $student = $accounts->first()->student;
        return view('billing.collect', compact('accounts', 'student'));

    }
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
