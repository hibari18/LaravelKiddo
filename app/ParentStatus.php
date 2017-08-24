<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentStatus extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblParentStatId'; 
	protected $table = 'tblparentstatus'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;
}
}
