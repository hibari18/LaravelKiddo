<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblAccId'; 
	protected $table = 'tblaccount'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function student(){
		return $this->belongsTo('App\Student', 'tblAcc_tblStudentId', 'tblStudentId');
	}

	public function studscheme(){
		return $this->belongsTo('App\StudScheme', 'tblAcc_tblStudSchemeId', 'tblStudSchemeId');
	}
}
