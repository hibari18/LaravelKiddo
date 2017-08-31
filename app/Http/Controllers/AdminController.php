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


    public function accountlist()
    {	

    	return view('account.accountlist');
    }

    public function adminaccount()
    {   

        return view('account.adminaccount');
    }

    public function advisorylist()
    {   

        return view('grades.advisorylist');
    }

    public function studentlist()
    {   

        return view('grades.studentlist');
    }

    public function viewgrade()
    {   

        return view('grades.viewgrade');
    }

    public function dashboard()
    {   

        return view('dashboard.dashboard');
    }

}
