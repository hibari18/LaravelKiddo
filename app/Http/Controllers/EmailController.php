<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\ComposeEmail;
use App\FamilyInfo;
use App\Message;
use Excel;
use DB;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $variable = Message::select('tblMessageSubject', 'tblMessageText', 'tblMessageSender', 'tblMessageDate')->get();

      $name = DB::select(DB::raw("select tblParentId, concat(tblParentFname, ' ', tblParentLname) as fullName from tblParent"));

      $getemail = FamilyInfo::select('tblParentEmail')->where('tblParentFlag', 1)->get();

      return view('message.compose', compact('getemail', 'name'));
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
      //Mail::send(new ComposeEmail());

      $var = Message::create([
        'tblMessageSubject' => $request->subject,
        'tblMessageText' => $request->message,
        'tblMessageDate' => $request->timeSent,
      ]);
       $sender = $request->user;
      // if($sender s)

      return redirect()->route('compose.index');
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
