<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblFacultyId'; 
	protected $table = 'tblfaculty'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

	public function getNameAttribute(){
		return $this->tblFacultyFname.' '.$this->tblFacultyMname.' '.$this->tblFacultyLname;
	}
}
