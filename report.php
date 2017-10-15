<?php
require ("fpdf.php");
$con  = mysqli_connect("localhost","root","");
mysqli_select_db($con,'dbkadc');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('public/images/School Logo/logo.png',35,10,150,30);
    // Arial bold 10
    $this->SetFont('Arial','',8);
    // Set placement
    $this->SetXY(111,25);
    // Contact Details
    $this->Cell(10,10,"2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"Telephone Nos.: 576-4171/0905-5529605",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"E-mail: kiddo_academy@yahoo.com",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"Website: www.kiddoacademy.com",0,0,'C');

    $this->SetXY(100,55);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"CLASS LIST",0,0,'C');

}



 // function Content()

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$pdf = new PDF();
	$pdf -> AliasNbPages();
	$pdf -> AddPage("P","Letter",0);
    $pdf -> AddPage("P","Letter",0);
    $pdf -> AddPage("P","Letter",0);
	$pdf -> Output();


?>