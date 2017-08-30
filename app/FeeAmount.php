<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblFeeAmountId'; 
	protected $table = 'tblfeeamount'; 
	// protected $softDelete = true; 
	public $timestamps = false;


	public function level(){
		return $this->belongsTo('App\Level', 'tblFeeAmount_tblLevelId', 'tblLevelId');
	}

	public function fees(){
		return $this->belongsTo('App\Fees', 'tblFeeAmount_tblFeeId', 'tblFeeId');
	}
}
