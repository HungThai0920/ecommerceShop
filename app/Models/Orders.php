<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = [
    	'transaction_id',
    	'product_id',
    	'qty',
    	'product_name',
    	'price',
    	'amount',
    ];
    
    public $timestamps = true;
}
