<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use Notifiable;
    //
    //quản trị viên quản trị toàn bộ hệ thống 
    const SUPER_ADMIN = 1;
    // QUẢN TRỊ VIÊN
    const ADMIN = 2;
    // trạng thái của tài khoản
    const STATUS = 1;
    
    protected $guard = 'admins';

    protected $fillable = [
    	'user_name',
    	'roles',
    	'password',
    	'email',
    	'status',
    ];
    
    public $timestamps = true;
}
