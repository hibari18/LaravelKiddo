<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyInfo extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblParentId'; 
	protected $table = 'tblparent'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
