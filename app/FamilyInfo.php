<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyInfo extends Model
{
    protected $guarded = []; 
	 
	protected $primaryKey = 'tblParentId'; 
	protected $table = 'tblparent'; 
	// protected $softDelete = true; 
	public $timestamps = false;
	public $incrementing = false;

	public static function next_parent_id($sy){
		$parent = self::whereRaw("left(tblParentId, 2) = '$sy'")->pluck('tblParentId')->last();

		$parent = substr($parent, 3);
		if(empty($parent))
		{
			$parent='001';
		}
		else
		{
			$parent++;
		}
		$id2 = sprintf('%03d', $parent);
		$parentid=$sy.$id2;

		return $parentid;
	}
}
