<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $guarded = [];

  protected $primaryKey = 'tblMessageId'; 
  protected $table = 'tblmessage';
  // protected $softDelete = true;
  public $timestamps = false;
  public $incrementing = false;
}
