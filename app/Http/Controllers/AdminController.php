<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function message()
    {	

    	return view('message.message');
    }

    public function compose()
    {	

    	return view('message.compose');
    }

     public function readmail()
    {	

    	return view('message.readmail');
    }

     public function sectioning()
    {	

    	return view('sectioning.sectioning');
    }


     public function diswith()
    {	

    	return view('dismiss-withdraw.diswith');
    }

    public function adminaccount()
    {	

    	return view('account.adminaccount');
    }
}
