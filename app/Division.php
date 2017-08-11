<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblDivisionId'; 
	protected $table = 'tblDivision'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

	public function curriculum_details(){
		return $this->hasMany('App\CurriculumDetail', 'tblCurriculumDetail_tblDivisionId', 'tblDivisionId');
	}
}
