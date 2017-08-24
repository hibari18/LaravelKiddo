<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudLivesWith extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblLivesWithId'; 
	protected $table = 'tblstudliveswith'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
