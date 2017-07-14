<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class CurriculumDetail extends Model
{
    // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblCurriculumDetailId'; 
	protected $table = 'tblCurriculumDetail'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false; 
	

	public function curriculum(){
		return $this->belongsTo('App\Curriculum', 'tblCurriculumDetail_tblCurriculumId', 'tblCurriculumId');
	}
	public function division(){
		return $this->belongsTo('App\Division', 'tblCurriculumDetail_tblDivisionId', 'tblDivisionId');
	}
	public function level(){
		return $this->belongsTo('App\Level', 'tblCurriculumDetail_tblLevelId', 'tblLevelId');
	}
	public function subject(){
		return $this->belongsTo('App\Subject', 'tblCurriculumDetail_tblSubjectId', 'tblSubjectId');
	}
}
