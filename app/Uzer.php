<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uzer extends Model
{
    // use SoftDeletes;

  	protected $guarded = [];

	protected $primaryKey = 'tblUserId';
	protected $table = 'tbluser';
	// protected $softDelete = true;
	public $timestamps = false;
	public $incrementing = false;
}
