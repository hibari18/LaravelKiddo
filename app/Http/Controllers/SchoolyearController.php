<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoolyear;
use App\Grading;
use App\Curriculum;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolyears = Schoolyear::leftjoin('tblcurriculum','tblcurriculum.tblCurriculumId','=','tblschoolyear.tblSchoolYr_tblCurriculumId')->where('tblschoolyear.tblSchoolYearFlag', 1)->get();
        $gradings = Grading::where('tblGradingFlag', 1)->get();
        $curriculums = Curriculum::where('tblCurriculumFlag', 1)->get();

        return view('schoolyear.index', compact('schoolyears','gradings','curriculums'));
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
        $yr = $request->txtUpdSyYear;
        $schyr = "S.Y. ".$yr.'-'.($yr+1) ;
        $schoolyear = Schoolyear::create([
            'tblSchoolYrYear' => $schyr,
            'tblSchoolYrStart' => $yr,
            'tblSchoolYr_tblCurriculumId' => $request->selUpdSyCurr,
        ]);

        $message = $schoolyear ? 2 : 1;
        return redirect()->route('schoolyear.index')->with('message', $message);
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
    public function edit(Request $request)
    {
        $schoolyear = Schoolyear::where('tblSchoolYrId',$request->id)->get();
        return response()->json($schoolyear);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $schoolyear = Schoolyear::findOrFail($request->txtUpdSyId);
        $message = $schoolyear->update([
            'tblSchoolYrStart' => $request->txtUpdSyYear,
            'tblSchoolYrYear' => 'S.Y. '.$request->txtUpdSyYear.'-'.($request->txtUpdSyYear + 1),
            // 'tblSchoolYrActive' => ,
        ]) ? 4 : 3;
        
        return redirect()->route('schoolyear.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $schoolyear = Schoolyear::findOrFail($request->txtDelSyId);
        
        $message = $schoolyear->update(['tblSchoolYearFlag' => 0]) ? 6 : 5;
        return redirect()->route('schoolyear.index')->with('message', $message);
    }
}
