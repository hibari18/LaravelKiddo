<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Level;
use App\Student;

class QueryController extends Controller
{
    public function index(){
    	$applicant = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='APPLICANT' and s.tblStudentFlag=1;"));
    	$level = Level::where('tblLevelFlag', 1)->get();

    	return view('query.queryapplicants', compact('applicant', 'level', 'parent', 'faculty'));

    }
    public function show($id){
    	$applicant = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='APPLICANT' and s.tblStudent_tblLevelId='${id}'"));
    	return view('query.table.applicanttable', compact('applicant'));
    }

    public function parent(){
    	$parent = DB::select(DB::raw("select tblParentId, concat(tblParentLname, ', ', tblParentFname, ' ', tblParentMname) as parentname from tblparent where tblParentFlag=1"));

    	return view('query.queryparent', compact('parent'));
    }

    public function faculty(){
    	$faculty = DB::select(DB::raw("select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as facultyname from tblfaculty where tblFacultyFlag=1"));
    	
    	return view('query.queryfaculty', compact('faculty'));
    }
}
