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
    public function edit(Request $request, $id)
    {
        $studid= $request->txtStudId;

        $syid = SchoolYear::select('tblSchoolYrId')->where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1)->first()->tblSchoolYrId;
        
        $studd = Student::where('tblStudentId', $request->txtStudId)->where('tblStudentFlag', 1)->get();
        
        $account = DB::table('tblaccount as a')->join('tblstudscheme as s','a.tblAcc_tblStudSchemeId','=','s.tblStudSchemeId')->where('a.tblAcc_tblStudentId', $studid)->where('s.tblStudScheme_tblSchoolYrId', 5)->where('a.tblAccPaid', '!=', 'PAID')->groupBy('a.tblAccPaymentNum', 'a.tblAcc_tblStudSchemeId')->get();
        //dd($account);
        
            $feeId= $account->tblStudScheme_tblFeeId;
            $fees = Fees::where('tblFeeId', $feeId)->first();
            dd($fees);
                foreach ($fees as $f) {
                    $fee= $f->tblFeeCode;
                    $feename= $f->tblFeeName;
                }

        $opt = Fees::where('tblFeeMandatory','N')->where('tblFeeFlag','1')->get();


        return view('billing.billingmain', compact('syid', 'studd', 'account', 'studid', 'opt', 'fee', 'feename'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function bills (Request $request, $id)
    {
        $acc= $request->chkbills;

        return view('billing.collect', compact('acc'));

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
