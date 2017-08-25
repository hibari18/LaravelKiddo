<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurriculumDetail;
use App\Level;
use App\Subject;
use App\Division;

class CurriculumDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::where('tblLevelFlag', 1)->get();
        $subjects = Subject::where('tblSubjectFlag', 1)->get();
        //$details = CurriculumDetail::where('tblDetailsFlag', 1)->get();
        $details = null;

        return view('curriculum.index', compact('levels', 'subjects', 'details'));
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
        
        $duplicate = CurriculumDetail::where('tblCurriculumDetail_tblLevelId', $request->selAddDetLvl)->first();
        if($duplicate){
            if($duplicate->tblDetailsFlag==1)
                return redirect()->route('division.index')->with('message', 1);
            $duplicate->tblDetailsFlag = 1;
            $duplicate->save();
            return redirect()->route('division.index')->with('message', 2);
        }

        $details = CurriculumDetail::create([
            'tblCurriculumDetail_tblDivisionId' => trim($request->selAddDetDiv),
            'tblCurriculumDetail_tblLevelId' => trim($request->selAddDetLvl),
            'tblCurriculumDetail_tblSubjectId' => trim($request->selAddDetSubj),
            ]);
        $message = $details ? 2 : 1;

        return redirect()->route('division.index')->with('message', $message);

    }

    /**
     * Return resources based on given curriculum id
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $details = Division::where('tblDivisionId', $id)->first()
            ->curriculum_details()->where('tblDetailsFlag', 1)->get();

        return view('curriculum.table.curriculum-details', compact('details'));
    }

    public function show2(Request $request, $id)
    {
       $levels = Level::where('tblLevel_tblDivisionId', $id)->where('tblLevelFlag', 1)->get();
       echo '<option selected value="">--Select Level--</option>';
        foreach($levels as $level){
            echo '<option value="'.$level->tblLevelId.'">'.$level->tblLevelName.'</option>';
        }

        return;
    }

    public function show3(Request $request, $id)
    {

        $subject = Subject::findOrFail($id);
        return $subject->tblSubjectDesc;

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

        $details = CurriculumDetail::findOrFail($request->txtUpdDetId);
        $message = $details->update([
            'tblCurriculumDetail_tblLevelId' => trim($request->selUpdDetLvl),
            'tblCurriculumDetail_tblSubjectId' => trim($request->selUpdDetSubj),
        ]) ? 4 : 3;

        return redirect()->route('division.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $details = CurriculumDetail::findOrFail($request->txtDelDetId);

        $message = $details->update(['tblDetailsFlag' => 0]) ? 6 : 5;
        return redirect()->route('division.index')->with('message', $message);
    }
}
