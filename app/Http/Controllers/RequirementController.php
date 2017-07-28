<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirement::where('tblRequirementFlag', 1)->get();

        return view('requirement.index', compact('requirements'));
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
        $requirement = Requirement::create([
            'tblReqName' => strtoupper(trim($request->txtAddReqName)),
            'tblReqDescription' => strtoupper(trim($request->txtAddReqDesc)),
        ]);

        $message = $requirement ? 2 : 1;
        
        return redirect()->route('requirement.index')->with('message', $message);
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
        $requirement = Requirement::findOrFail($request->txtUpdReqId);
        $message = $requirement->update([
            'tblReqName' => strtoupper(trim($request->txtUpdReqName)),
            'tblReqDescription' => strtoupper(trim($request->txtUpdReqDesc)),
        ]) ? 4 : 3;
        
        return redirect()->route('requirement.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $requirement = Requirement::findOrFail($request->txtDelReqId);
       
        $message = $requirement->update(['tblRequirementFlag' => 0]) ? 6 : 5;
        return redirect()->route('requirement.index')->with('message', $message);
    }
}
