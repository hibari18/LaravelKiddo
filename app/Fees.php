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
	public $incrementing = false; 

}
