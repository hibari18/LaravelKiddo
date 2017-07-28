<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Division;
use App\Level;
use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sections = Section::where('tblSectionFlag', 1)->get();
        $sections = DB::table('tblSection')->leftjoin('tblLevel','tblLevel.tblLevelId','=','tblSection.tblSection_tblLevelId')->leftjoin('tblDivision','tblDivision.tblDivisionId','=','tblLevel.tblLevel_tblDivisionId')->where('tblLevelFlag',1)->where('tblDivisionFlag',1)->where('tblSectionFlag',1)->get();

        $divisions = Division::where('tblDivisionFlag', 1)->get();

        $levels = Level::where('tblLevelFlag', 1)->get();

        return view('section.index', compact('sections','divisions','levels'));
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
        $section = Section::create([
            'tblSection_tblLevelId' => trim($request->addLvlSelect),
            'tblSectionName' => strtoupper(trim($request->addSectTxt)),
            'tblSectionSession' => trim($request->addSesSelect),
        ]);

        $message = $section ? 2 : 1;
        
        return redirect()->route('section.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $levels = Level::where('tblLevel_tblDivisionId', $id)->where('tblLevelFlag', 1)->get();
        
        return view('section.select.level', compact('levels'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show1($id)
    {
       $levels = Level::where('tblLevel_tblDivisionId', $id)->where('tblLevelFlag', 1)->get();
        
        return view('section.select.level2', compact('levels'));
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
        $section = Section::findOrFail($request->updLvlName);
        $lvlId = Level::where('tblLevelName', $request->updLvlName)->first()->tblLevelId;
        $message = $section->update([
            'tblSection_tblLevelId' => $lvlId,
            'tblSectionName' => strtoupper(trim($request->updSectName)),
            'tblSectionSession' => trim($request->updSesSelect),
        ]) ? 4 : 3;
        
        return redirect()->route('section.index')->with('message', $message);
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
