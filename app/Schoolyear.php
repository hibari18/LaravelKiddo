<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Schoolyear extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSchoolYrId'; 
	protected $table = 'tblschoolyear'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
}