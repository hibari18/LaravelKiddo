<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $table = 'tblgrade'; 
	protected $primaryKey= 'tblGradeId'; 
	// protected $softDelete = true; 
	public $timestamps = false;
}
