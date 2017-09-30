<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
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

        return view('grades.advisorylist', compact('sections','slist'));
        
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
        $subj=array();
        $stud=$_POST['txtStudId'];
        $sectid=$_POST['txtSectId'];
        $grd=$_POST['txtGrade'];

        $slist = DB::select(DB::raw("select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId"));

        while($row=mysqli_fetch_array($slist))
        {
            $subjId=$row['tblSubjectId'];
            array_push($subj, $subjId);
        }
        $i=0;
        foreach($stud as $value)
        {
            $studLength=count($subj);
            for($x=0; $x<$studLength; $x++)
            {
                $query1= Grade::orderBy('tblGradeId', 'desc')->pluck('tblGradeId')->first();
                
                $slist = Grade::create([
                    'tblGradeId'=> $gradeid,
                    'tblGradeGrade'=> $grd[$i],
                    'tblGrade_tblStudentId'=> $value,
                    'tblGrade_tblSubjectId'=> $subj[$x],

                ]);
               
                return $value.": ".$subj[$x]." = ".$grd[$i].'<br/>';
                $i++;
            }
        }

        return view('grades.index',compact('subj','stud','grd','slist'));
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

        // dd($subjname, $stud);
        return view('grades.studentlist', compact('sectid', 'sects','subjname','stud'));

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
