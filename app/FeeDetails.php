<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeDetails extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblFeeDetailId'; 
	protected $table = 'tblfeedetail'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

	public function fees(){
		return $this->belongsTo('App\Fees', 'tblFeeDetail_tblFeeId', 'tblFeeId');
	}

	public function feedetails(){
		return $this->belongsTo('App\FeeDetails', 'tblFeeDetail_tblFeeDetailId', 'tblFeeDetailId');
	}
}
