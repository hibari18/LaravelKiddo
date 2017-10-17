<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
     // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblFeeId'; 
	protected $table = 'tblfee'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function getStatusAttribute(){
		return $this->tblFeeMandatory == 'Y' ? 'MANDATORY' : 'OPTIONAL';
	}

	public function total_amount($level = null){
		if($this->tblFeeType == "MASS FEE")
			return $this->schemedetails()->sum('tblSchemeDetailAmount');
		
		return $this->schemedetails()->where('tblSchemeDetail_tblLevel', $level)->sum('tblSchemeDetailAmount');
	}

	public function level(){
		return $this->belongsTo('App\Level', 'tblCurriculumDetail_tblLevelId', 'tblLevelId');
	}

	public function fees(){
		return $this->belongsTo('App\Fees', 'tblFees_tblFeeId', 'tblFeeId');
	}
	public function feeamount(){
		return $this->belongsTo('App\FeeAmount', 'tblFeeAmount_tblFeeId', 'tblFeeAmountId');
	}

	public function schemes(){
		return $this->hasMany('App\SchemeType', 'tblScheme_tblFeeId', 'tblFeeId');
	}

	public function schemedetails(){
		return $this->hasMany('App\Schedule', 'tblSchemeDetail_tblFee', 'tblFeeId');
	}

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
