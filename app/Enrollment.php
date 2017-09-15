<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudEnrollId'; 
	protected $table = 'tblstudenroll'; 
	// protected $softDelete = true; 
	public $timestamps = false;
}
