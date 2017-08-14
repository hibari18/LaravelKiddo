<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthInfo extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudHealthId'; 
	protected $table = 'tblstudhealth'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
