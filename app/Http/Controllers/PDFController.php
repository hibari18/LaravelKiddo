<?php

namespace App\Http\Controllers;

//require_once 'autoload.inc.php';
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Student;
use App\PersonalInfo;
use DB;

class PDFController extends Controller
{
   public function index()
    {
        $student= Student::where('tblStudentFlag', 1)->get();
        $name = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='OFFICIAL'"));
    return view('pdf.listofstudent', compact('student', 'name'));
        //
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
        $pdf= Student::select('tblStudentId', $request->txtStudId)->get();
        return view('pdf.statementofaccount', compact('pdf'));
        
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
	
  public function getPDF(Request $request, $id){
    $id= Student::select('tblStudentId', $request->txtStudId)->first();
		$pdf = \PDF::view('pdf.statementofaccount',$id);
    

		
$_dompdf_show_warnings = true;
$_dompdf_warnings = [];


$options = new Options();
$options->set('defaultFont', 'Courier');
$options->set('isRemoteEnabled', TRUE);
$options->set('debugKeepTemp', TRUE);
$options->set('isHtml5ParserEnabled', true);
$options->set('chroot', '');
$dompdf = new Dompdf($options);


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml("pdf.statementofaccount", compact('pdf'));


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('','landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
    	$dompdf=PDF::view('pdf.statementofaccount', compact('pdf'));
    	return $dompdf->stream('test.pdf');
      
    }


public function setPaper($paper, $orientation = 'landscape'){
 	      $this->paper = $paper;
          $this->orientation = $orientation;
          $this->dompdf->setPaper($paper, $orientation);
          return $this;
      }

public function accnt(Request $request, $id)
    {
        $pdf= Student::select('tblStudentId', $request->txtStudId)->get();
        return view('pdf.statementofaccount', compact('pdf'));
        
    }

}

