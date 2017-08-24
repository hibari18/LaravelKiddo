<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudRelative extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudRelId'; 
	protected $table = 'tblstudrelative'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
