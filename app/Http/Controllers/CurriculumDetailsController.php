<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurriculumDetail;
use App\Level;
use App\Subject;

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
        $details = CurriculumDetail::where('tblDetailsFlag', 1)->get();

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
        $details = CurriculumDetail::create([
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
        $details = CurriculumDetail::where('tblCurriculumDetail_tblCurriculumId', $id)->where('tblDetailsFlag', 1)->get();
        
        return view('curriculum.table.curriculum-details', compact('details'));
    }

    public function show2(Request $request, $id)
    {
       $levels = Level::where('tblLevel_tblDivisionId', $id)->where('tblLevelFlag', 1)->get();
        foreach($levels as $level){
            echo '<option value="'.$level->tblLevelId.'">'.$level->tblLevelName.'</option>';
        }

        return view('curriculum.select.leveladd', compact('levels'));
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
        //
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
