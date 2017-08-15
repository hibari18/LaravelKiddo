<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BySection extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblSectStudId'; 
	protected $table = 'tblsectionstud'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
