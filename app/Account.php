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
		return $this->belongsTo('App\Student', 'tblstudent_tblStudInfoId', 'tblStudentId');
	}

	public function fee(){
		return $this->belongsTo('App\Fees', 'tblStudScheme_tblFeeId', 'tblFeeId');
	}

	public function accounts(){
		return $this->hasMany('App\Account', 'tblAcc_tblStudSchemeId', 'tblStudSchemeId');
	}
}
