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
}
