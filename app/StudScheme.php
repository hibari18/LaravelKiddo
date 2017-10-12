<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudScheme extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudSchemeId'; 
	protected $table = 'tblstudscheme'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function student(){
		return $this->belongsTo('App\Student', 'tblstudent_tblStudInfoId', 'tblStudentId');
	}

	public function fee(){
		return $this->belongsTo('App\Fees', 'tblStudScheme_tblFeeId', 'tblFeeId')->where('tblFeeFlag', 1);
	}

	public function accounts(){
		return $this->hasMany('App\Account', 'tblAcc_tblStudSchemeId', 'tblStudSchemeId')->where('tblAccFlag', 1);
	}
}
