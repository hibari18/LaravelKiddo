<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Requirement extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblReqId'; 
	protected $table = 'tblrequirement'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
}
