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
		return $this->belongsTo('App\Fees', 'tblStudScheme_tblFeeId', 'tblFeeId');
	}

	public function scheme(){
		return $this->belongsTo('App\SchemeType', 'tblStudScheme_tblSchemeId', 'tblSchemeId');
	}

	public function accounts(){
		return $this->hasMany('App\Account', 'tblAcc_tblStudSchemeId', 'tblStudSchemeId');
	}
}
