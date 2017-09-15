<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $guarded = []; 
	 
	protected $primaryKey = 'tblRoleId'; 
	protected $table = 'tblrole'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
