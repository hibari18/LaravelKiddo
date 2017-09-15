<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudScheme extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudSchemeId'; 
	protected $table = 'tblstudscheme'; 
	// protected $softDelete = true; 
	public $timestamps = false;
}
