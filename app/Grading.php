<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Grading extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblGradingId'; 
	protected $table = 'tblgradingperiod'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

	public function schoolyear(){
		return $this->belongsTo('App\SchoolYear', 'tblGrading_tblSchoolYrId', 'tblSchoolYrId');
	}
}