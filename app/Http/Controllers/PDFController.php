<?php

namespace App\Http\Controllers;

//require_once 'autoload.inc.php';
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;


class PDFController extends Controller
{
	public function getPDF(){
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
$dompdf->loadHtml("pdf.classlist");


// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', "Landscape");

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
    	$dompdf=PDF::loadView('pdf.classlist');
    	return $dompdf->stream('test.pdf');
    }

}

