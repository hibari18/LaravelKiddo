<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DismissWithdraw extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudDismissId'; 
	protected $table = 'studdismisswithdraw'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

}
