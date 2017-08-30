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


	public function level(){
		return $this->belongsTo('App\Level', 'tblCurriculumDetail_tblLevelId', 'tblLevelId');
	}

	public function fees(){
		return $this->belongsTo('App\Fees', 'tblFees_tblFeeId', 'tblFeeId');
	}
	public function feeamount(){
		return $this->belongsTo('App\FeeAmount', 'tblFeeAmount_tblFeeId', 'tblFeeAmountId');
	}
}
