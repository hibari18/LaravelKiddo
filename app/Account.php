<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblAccId'; 
	protected $table = 'tblaccount'; 
	// protected $softDelete = true; 
	public $timestamps = false;
}
