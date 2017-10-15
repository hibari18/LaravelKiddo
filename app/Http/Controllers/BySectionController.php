<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BySection;
use App\Level;
use App\Student;
use App\Section;
USE App\SchoolYear;
use DB;

class BySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bysections = BySection::where('tblSectStudFlag', 1)->get();
        $sect = DB::select(DB::raw("select tblsection.tblSectionId, tblsection.tblSectionName, tbllevel.tblLevelName, tbldivision.tblDivisionName, tblsection.tblSectionSession, count(tblsectionstud.tblSectStud_tblSectionId) as sectCount from tblsection inner join tbllevel on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId inner join tbldivision on tbllevel.tblLevel_tblDivisionId=tbldivision.tblDivisionId left join tblsectionstud on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId where tblsection.tblSectionFlag=1 group by tblsection.tblSectionId"));
        $levels = Level::where('tblLevelFlag', 1)->get();



        return view('sectioning.index', compact('bysection', 'sect', 'levels'));
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
        
        $sectid=$_POST['txtFillSectionId'];

        $syid = SchoolYear::select('tblSchoolYrId')->where('tblSchoolYrActive', 'ACTIVE')->where('tblSchoolYearFlag', 1)->first()->tblSchoolYrId;
       
        $cnt= DB::table('tblsectionstud')->select(DB::raw('count(tblsectstudid) as scount'))->where('tblSectStud_tblSectionId', $sectid)->where('tblsectstudflag',1)->first();
        $sectcnt=$cnt->scount;
        $arrStud=array();

        if($sectcnt < 15)
        {
            $limit = DB::table('tblstudent as s')->join('tblstudentinfo as si','s.tblStudentId','=','si.tblStudInfo_tblStudentId')->select(DB::raw('s.tblStudentId, concat(si.tblStudInfoLname, si.tblStudInfoFname, si.tblStudInfoMname) as name'))->where('s.tblStudentType','OFFICIAL')->where('s.tblStudentFlag',1)->orderByRaw("RAND()")->get();

            foreach($limit as $row){
                $studid=$row->tblStudentId;
                array_push($arrStud, $studid);
            }//foreach
            
            if (count($arrStud) >= 15){ 
            $x = 16;  
            }
            else
            {
               $x = count($arrStud);
            }//else
                
                for($y=0; $y<$x; $y++)
                {   
                    $stud = $arrStud[$y]; 
                    $studsect = DB::table('tblsectionstud')->select(DB::raw('tblSectStudId'))->get();  
                    //dd($studsect);
                        if (count($studsect) > 0){
                            //dd($studsect);  
                                foreach($studsect as $stdc){
                                    $sectstudid= $stdc->tblSectStudId;
                                    $stsect = BySection::create([
                                        'tblSectStudId' => $sectstudid,
                                        'tblSectStud_tblSectionId' => $sectid,
                                        'tblSectStud_tblStudentId' => $stud,
                                        'tblSectStud_tblSchoolYrId' => $syid,    

                                ]); 
                                }//foreach

                        }//if

                }//for

                

            $message = 2;
            return redirect()->route('sectioning.index')->with('message', $message);
        }//if
        else
        {
            $message = 1;
            return redirect()->route('sectioning.index')->with('message', $message);
        }
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
        $lvlid=$_GET['txtlvl'];
        $lvl = Level::where('tblLevelId', $lvlid)->where('tblLevelFlag', 1)->get();

        $section = Section::where('tblSection_tblLevelId', $lvlid)->where('tblSectionFlag', 1)->get();

        //$studd = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studname, s.tblStudent_tblSectionId from tblstudent s, tblstudentinfo si where si.tblStudInfo_tblStudentId=s.tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudent_tblLevelId='$lvlid' and s.tblStudentFlag=1"));
        
        $studd = DB::table('tblstudent as s')->join('tblstudentinfo as si','s.tblStudentId','=','si.tblStudInfo_tblStudentId')->select(DB::raw('s.tblStudentId, concat(si.tblStudInfoLname, si.tblStudInfoFname, si.tblStudInfoMname) as studname, s.tblStudent_tblSectionId'))->where('s.tblStudentType','OFFICIAL')->where('s.tblStudentFlag', 1)->where('s.tblStudent_tblLevelId', $lvlid)->get();
        
        //$sectid=$studd->tblStudent_tblSectionId;
        $sect= Section::where('tblSectionFlag', 1)->where('tblSectionId', $request->tblStudent_tblSectionId)->get();
        
        return view('sectioning.sectionstudent', compact('lvlid', 'lvl', 'section', 'studd', 'sect'));
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

        $studid= $request->txtStudId;
        $sectname=$request->selSection;

        $sect = Section::where('tblSectionName', $sectname)->where('tblSectionFlag', 1)->get();
        $sectid=$sect->tblSectionId;
        $lvlid=$sect->tblSection_tblLevelId;
        $student = Student::where('tblStudentId', $studid)->where('tblStudentFlag', 1)-first();
        $student->update(['tblStudent_tblSectionId'=>$sectid]);

        return view('sectioning.sectionstudent', compact('student', 'sect', 'studid'));
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
