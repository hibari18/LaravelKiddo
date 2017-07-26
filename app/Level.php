<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblLevelId'; 
	protected $table = 'tbllevel'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function division(){
		return $this->belongsTo('App\Division', 'tblLevel_tblDivisionId', 'tblDivisionId');
	}

	public function curriculum_details(){
		return $this->hasMany('App\CurriculumDetail', 'tblCurriculumDetail_tblLevelId', 'tblLevelId');
	}
}
