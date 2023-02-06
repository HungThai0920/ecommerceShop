<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';

    protected $fillable = [
    	'user_id',
    	'name',
    	'email',
    	'phone',
    	'address',
    	'amount',
    	'payment',
    	'transport',
    	'message',
        'status',
        'shiper',
        'remember_token',

    ];
    
    public $timestamps = true;
}
