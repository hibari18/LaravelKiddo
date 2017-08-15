<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSchoolYrId'; 
	protected $table = 'tblschoolyear'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
}
