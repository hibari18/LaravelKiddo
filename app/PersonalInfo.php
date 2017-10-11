<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudInfoId'; 
	protected $table = 'tblstudentinfo'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

	public function student(){
		return $this->hasOne('App\Student', 'tblStudentId', 'tblStudInfo_tblStudentId');
	}

	public function getNameAttribute(){
		return $this->tblStudInfoLname. ', '. $this->tblStudInfoFname. ' '. $this->tblStudInfoMname;
	}
}
