<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSubjectId'; 
	protected $table = 'tblSubject'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
}
