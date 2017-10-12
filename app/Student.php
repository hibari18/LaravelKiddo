<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudentId'; 
	protected $table = 'tblstudent'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

	public function studentinfo(){
		return $this->hasMany('App\PersonalInfo', 'tblStudInfo_tblStudentId', 'tblStudentId');
	}

	public function studentdw(){
		return $this->hasMany('App\Student', 'tblStudDismiss_tblStudentId', 'tblStudentId');
	}

	public function student(){
		return $this->hasMany('App\Student', 'tblStudent_tblLevelId', 'tblStudentId');
	}

	public function schemes(){
		return $this->hasMany('App\StudScheme', 'tblStudScheme_tblStudentId', 'tblStudentId')->where('tblStudSchemeFlag', 1);
	}

	public function section(){
		return $this->belongsTo('App\Section', 'tblStudent_tblSectionId', 'tblSectionId');
	}
}
