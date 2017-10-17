<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\PersonalInfo;

class AccountReportController extends Controller
{
	$student= Student::where('tblStudentFlag', 1)->get();
	$studinfo = PersonalInfo::where('tblStudInfo_tblStudentId')->get();
	return view('pdf.listofstudent', compact('student','studinfo'));
    //
}
