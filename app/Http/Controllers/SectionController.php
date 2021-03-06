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



        $duplicate = Section::where('tblSectionName', $request->addSectTxt)->where('tblSection_tblLevelId', $request->addLvlSelect)->where('tblSectionSession', $request->addSesSelect)->first();
        if($duplicate){
            if($duplicate->tblSectionFlag==1)
                return redirect()->route('section.index')->with('message', 7);
            $duplicate->tblSectionFlag = 1;
            $duplicate->save();
            return redirect()->route('section.index')->with('message', 2);
        }

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
        echo '<option selected value="">--Select Level--</option>';
        foreach($levels as $level){
            echo '<option value="'.$level->tblLevelId.'">'.$level->tblLevelName.'</option>';
        }
        return;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show1($divId, $lvlId)
    {
        $levels = Level::where('tblLevel_tblDivisionId', $divId)->where('tblLevelFlag', 1)->get();
        foreach($levels as $level){
            $selected = $lvlId == $level->tblLevelId ? 'selected':'';
            echo '<option '.$selected.' value="'.$level->tblLevelName.'">'.$level->tblLevelName.'</option>';
        }
        return;
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

        $section = Section::findOrFail($request->updSectId);
        $lvlId = Level::where('tblLevelName', $request->updLvlName)->first()->tblLevelId;
        
        if(Section::where('tblSectionName', $request->updSectName)->where('tblSectionId','!=', $section->tblSectionId)->where('tblSectionFlag', 1) ->where('tblSection_tblLevelId', $request->updLvlId)->first() == null)
        {

       $message = $section->update([
            'tblSection_tblLevelId' => $lvlId,
            'tblSectionName' => strtoupper(trim($request->updSectName)),
            'tblSectionSession' => trim($request->updSesSelect),
        ]) ? 4 : 3;
        
        }

        else {
        $message = 3;
        return redirect()->route('section.index')->with('message', $message);
        
        }
        return redirect()->route('section.index')->with('message', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $section = Section::findOrFail($request->txtDelSectId);

        $message = $section->update(['tblSectionFlag' => 0]) ? 6 : 5;
        return redirect()->route('section.index')->with('message', $message);
    }
}
