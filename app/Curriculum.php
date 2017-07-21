<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblCurriculumId'; 
	protected $table = 'tblCurriculum'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

	public function schoolyears(){
		return $this->hasMany('App\Schoolyear', 'tblSchoolYr_tblCurriculumId', 'tblCurriculumId');
	}

	public function curriculum_details(){
		return $this->hasMany('App\CurriculumDetail', 'tblCurriculumDetail_tblCurriculumId', 'tblCurriculumId');
	}
}
