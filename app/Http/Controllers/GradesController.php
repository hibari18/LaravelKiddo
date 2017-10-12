<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Grades;
use App\Subject;
use App\Grading;
use DB;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::where('tblSectionFlag', 1)->get();
        $slist = [];
        $gradings = Grading::where('tblGradingFlag', 1)->get();

        return view('grades.advisorylist', compact('sections','slist', 'gradings'));
        
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
        $subj=array();
        $stud=$request->txtStudId;
        $sectid=$request->txtSectId;
        $grd=$request->txtGrade;

        // $slist = DB::select(DB::raw("select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId"));

        // $subj = array_column($slist, 'tblSubjectId');

        foreach($request->txtGrade as $key => $grade){
            $item = explode('-', $key);
            if($grade != null){
                Grades::updateOrCreate([
                    'tblGrade_tblStudentId'=> $item[0],
                    'tblGrade_tblSubjectId'=> $item[1],
                ],[
                    'tblGradeGrade'=> $grade,
                ]);
            }
        }

        return redirect()->route('advisorylist.index')->with(['message'=>1]);
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

    public function studlist(Request $request)
    {
        $sectid= $request->txtSectId;
        $sects = Section::select('tblSectionName')->where('tblSectionId', $sectid)->first();

        $subjname = DB::select(DB::raw("select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId"));

        $stud = DB::select(DB::raw("select distinct tblstudent.tblStudentId, concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name, tblsection.tblSectionId as sectid from tblsectionstud join tblstudent on tblstudent.tblStudentId=tblsectionstud.tblSectStud_tblStudentId join tblstudentinfo on tblstudentinfo.tblStudInfo_tblStudentId=tblstudent.tblStudentId join tblsection on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId join tblschoolyear on tblschoolyear.tblSchoolYrId=tblsectionstud.tblSectStud_tblSchoolYrId where tblsection.tblSectionId='$sectid' and tblschoolyear.tblSchoolYrActive='ACTIVE'"));
        $gradings = Grading::where('tblGradingFlag', 1)->get();


        //$grades = collect();
        foreach($stud as $student){
            foreach($subjname as $subject){
                $grade = Grades::where('tblGrade_tblStudentId', $student->tblStudentId)->where('tblGrade_tblSubjectId', $subject->tblSubjectId)->orderBy('tblGradeId', 'desc')->pluck('tblGradeGrade')->first();
                
                $grades["$student->tblStudentId-$subject->tblSubjectId"] = $grade;
            }
        }
         
        return view('grades.studentlist', compact('sectid', 'sects','subjname','stud', 'grades', 'gradings'));

    }


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
