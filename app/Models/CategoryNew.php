<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNew extends Model
{
    //
    
    protected $table = 'category_new';

    protected $fillable = [
    	'name',
    	'sort',
    	'status',
    ];
    
    public $timestamps = true;
    
}
