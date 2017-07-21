<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\Subject;
use App\Division;
use App\Level;
use App\CurriculumDetail;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = Curriculum::where('tblCurriculumFlag', 1)->get();
        $subjects = Subject::where('tblSubjectFlag', 1)->get();
        $levels = Level::where('tblLevelFlag', 1)->get();
        $divisions = Division::where('tblDivisionFlag', 1)->get();
        $details = CurriculumDetail::where('tblCurriculumFlag', 1)->get();


        return view('curriculum.index', compact('curriculums','subjects','levels','divisions','details'));
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
        $curriculum = Curriculum::create([
            'tblCurriculumName' => strtoupper(trim($request->txtAddCurr)),
            'tblCurriculumActive' => trim($request->selAddActive),
        ]);

        $message = $curriculum ? 2 : 1;
        
        return redirect()->route('curriculum.index')->with('message', $message);
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
        $curriculum = Curriculum::findOrFail($request->txtUpdCurrId);
        $message = $curriculum->update([
            'tblCurriculumName' => strtoupper(trim($request->txtUpdCurr)),
            'tblCurriculumActive' => trim($request->selUpdActive),
        ]) ? 4 : 3;
        
        return redirect()->route('curriculum.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $curriculum = Curriculum::findOrFail($request->txtDelCurrId);
        if($curriculum->schoolyears->where('tblSchoolYrActive','ACTIVE')->count() > 0 || $curriculum->curriculum_details->count() > 0){
            return redirect()->route('curriculum.index')->with('message', 7);
        }
        $message = $curriculum->update(['tblCurriculumFlag' => 0]) ? 6 : 5;
        return redirect()->route('curriculum.index')->with('message', $message);
    }
}
