<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblgrade'; 
	protected $table = 'tblGradeId'; 
	// protected $softDelete = true; 
	public $timestamps = false;
}
