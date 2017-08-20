<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudSiblings extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblStudSibId'; 
	protected $table = 'tblstudsiblings'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
