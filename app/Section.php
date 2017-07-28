<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSectionId'; 
	protected $table = 'tblsection'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 

	public function division(){
		return $this->belongsTo('App\Division', 'tblLevel_tblDivisionId', 'tblDivisionId');
	}
	public function level(){
		return $this->belongsTo('App\Level', 'tblCurriculumDetail_tblLevelId', 'tblLevelId');
	}
}
