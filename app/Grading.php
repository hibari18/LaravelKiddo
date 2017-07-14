<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Grading extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblCurriculumId'; 
	protected $table = 'tblCurriculum'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
}