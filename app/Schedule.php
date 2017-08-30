<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSchemeDetailId'; 
	protected $table = 'tblschemedetail'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function scheme(){
		return $this->belongsTo('App\SchemeType', 'tblSchemeDetail_tblScheme', 'tblSchemeId');
	}
	
}
