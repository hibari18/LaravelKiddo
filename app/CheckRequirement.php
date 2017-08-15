<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckRequirement extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudReqId'; 
	protected $table = 'tblstudreq'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

	public function level(){
		return $this->belongsTo('App\Level', 'tblStudentInfo_tblLevelId', 'tblLevelId');
	}
	public function requirement(){
		return $this->belongsTo('App\Requirement', 'tblStudentInfo_tblReqId', 'tblReqId');
	}
	public function schoolyear(){
		return $this->belongsTo('App\SchoolYear', 'tblStudentInfo_tblSchoolYrId', 'tblSchoolYrId');
	}
}
