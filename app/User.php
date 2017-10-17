<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     
    protected $primaryKey = 'tblUserId'; 
    protected $table = 'tbluser'; 
    // protected $softDelete = true; 
    public $timestamps = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tblUserName',
        'tblUserPassword'
    ];
    protected $guarded = ['tblUser_tblRoleId']; 

    protected $hidden = [
        'password', 'remember_token',
    ];
}
