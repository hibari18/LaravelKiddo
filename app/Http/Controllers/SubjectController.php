<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\CurriculumDetail;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         
        $subject = Subject::create([
            'tblSubjectId' => strtoupper(trim($request->txtAddSubjId)),
            'tblSubjectDesc' => strtoupper(trim($request->txtAddSubj)),
            'tblSubjActive' => trim($request->selAddSubjId),
        ]);

        $message = $subject ? 2 : 1;
        
        return redirect()->route('division.index')->with('message', $message);
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
        $subject = Subject::findOrFail($request->txtUpdSubjId);
        $message = $subject->update([
            'tblSubjectDesc' => strtoupper(trim($request->txtUpdSubj)),
            'tblSubjActive' => trim($request->selUpdSubjAct),
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
        $subject = Subject::findOrFail($request->txtDelSubjId);
        if($subject->curriculum_details->count() > 0){
            return redirect()->route('division.index')->with('message', 9);
        }
        $message = $subject->update(['tblSubjectFlag' => 0]) ? 6 : 5;
        return redirect()->route('division.index')->with('message', $message);
    }
}
