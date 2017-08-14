<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblFeeAmountId'; 
	protected $table = 'tblfeeamount'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

}
