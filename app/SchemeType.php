<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchemeType extends Model
{
     // use SoftDeletes; 
 
  	protected $guarded = []; 
	 
	protected $primaryKey = 'tblSchemeId'; 
	protected $table = 'tblscheme'; 
	// protected $softDelete = true; 
	public $timestamps = false;

	public function fees(){
		return $this->belongsTo('App\Fees', 'tblScheme_tblFeeId', 'tblFeeId');
	}
	
	public function scopeActive($query)
    {
        return $query->where('tblSchemeFlag', 1);
    }
}
