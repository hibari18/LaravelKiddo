<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeDetails;
use App\Amount;
use App\Level;
use App\Fees;


class FeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $feedetails = FeeDetails::where('tblFeeDetailFlag', 1)->get();
        $feedetails = null;
        $levels = Level::where('tblLevelFlag', 1)->get();
        $amounts = Amount::where('tblFeeAmountFlag')->get();

        return view('payment.index', compact('feedetails','levels','amounts'));
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
        $feeDet = $_POST['txtFeeDet'];
        $feeId = strtoupper($_POST['txtFeeDetFee']);
        
        $levels = Level::where('tblLevelFlag', 1)->get();
        $num = $levels->num_rows;
        for($i = 0; $i < $num; $i++)
        {
            $j = $i;
            $j++;
            $val = $_POST['txtName'][$i];
            $detId= FeeDetails::orderBy('tblFeeDetailId', 'desc')->pluck('tblFeeDetailId')->first();
            $detId++;
            
            $detId = FeeDetails::create([
                'tblFeeDetailId' => $detId,
                'tblFeeDetailName' => $feeDet,
                'tblFeeDetailAmount' => $val,
                'tblFeeDetail_tblFeeId' => $feeId,
                'tblFeeDetail_tblLevelId' => $j,
            ]);
            
            $amnt = FeeAmount::select('tblFeeAmountAmount')->where('tblFeeAmount_tblFeeId', $feeId)->where('tblFeeAmount_tblLevelId', $j)->where('tblFeeAmountFlag'. 1)->first();
            $amnt = $amnt + $val;
            
            $amnt = FeeAmount::where('tblFeeAmount_tblFeeId', $feeId)->where( 'tblFeeAmount_tblLevelId', $j)->where( 'tblFeeAmountFlag', 1)->update(['tblFeeAmountAmount'=> $amnt]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
     {
    //     $feedetails = Fees::where('tblFeeId', $id)->first()
    //         ->feedetails()->where('tblFeeDetailFlag', 1)->get();
        
        return view('payment.table.feedetail', compact('feedetails'));
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
        if(isset($_POST['btnFeeDet']))
        {
            $feeId = $_POST['txtUpdDetFeeId'];
            $lvlId = $_POST['txtUpdDetLvlId'];
            $tempDet = $_POST['txtTempDetName'];
            $det = $_POST['txtUpdDetName'];
            $amnt = $_POST['txtUpdDetAmnt'];
            $tempAmnt = FeeDetails::select('tblFeeDetailAmount')->where('tblFeeDetailName', $tempDet)->where('tblFeeDetailFlag', 1);

            $result = Level::where('tblLevelFlag', 1)->get();
            $num = $result->num_rows;
            for($i = 0; $i < $num; $i++)
            {
            FeeDetails::where('tblFeeDetailName', $tempDet)->where( 'tblFeeDetailFlag', 1)->update(['tblFeeDetailName'=> $det]);    

            }
            FeeDetails::where('tblFeeDetailName', $det)->where( 'tblFeeDetail_tblLevelId', $lvlId)->update(['tblFeeDetailAmount'=> $amnt]); 

            $amount = FeeAmount::select('tblFeeAmountAmount')->where('tblFeeAmount_tblLevelId', $lvlId)->where('tblFeeAmount_tblFeeId', $feeId);
            $amount = $amount - $tempAmnt;
            $amount = $amount + $amnt;
            FeeAmount::where('tblFeeAmount_tblLevelId', $lvlId)->where( 'tblFeeAmount_tblFeeId', $feeId)->update(['tblFeeAmountAmount'=> $amount]); 

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($_POST['btnDelFeeDet']))
        {
            $feeName = $_POST['txtDelFeeDet'];
            $amnt = $_POST['txtDelAmnt'];

            $query = "select tblFeeDetail_tblFee from tblfeedetail where tblFeeDetailName = '$feeName'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);

            $feeId = FeeDetail::select('tblFeeDetail_tblFee')->where('tblFeeDetailName', $feeName)->get();
            $amount = FeeAmount::select('tblFeeAmountAmount')->where('tblFeeAmount_tblFeeId', $feeId);
            $amount = $amount - $amnt;
            FeeAmount::where('tblFeeAmount_tblFeeId', $feeId)->update(['tblFeeAmountAmount'=> $amount]);    

            $result  = Level::where('tblLevelFlag', 1);
            $num = $result->num_rows;
            for($i = 0; $i < $num; $i++)
            {
            FeeDetail::where('tblFeeDetailName', $feeName)->update(['tblFeeDetailFlag'=> 0]);   

            }
        }
    }
}
