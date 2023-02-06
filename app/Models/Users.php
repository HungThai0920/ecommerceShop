<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    //
    use Notifiable;
    
    protected $guard = 'users';

    protected $fillable = [
    	'name',
    	'email',
    	'password',
    	'sex',
    	'phone',
    	'address',
    	'birthday',
    	'status',
    	'remember_token	',
    ];
    
    public $timestamps = true;
}
