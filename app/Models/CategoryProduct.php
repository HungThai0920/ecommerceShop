<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    const CATEGORY_PARENT = 0; // là danh mục cha
    protected $table = 'category_product';

    protected $fillable = [
    	'name',
    	'parent_id',
    	'orders',
    	'status'
    ];
    
    public $timestamps = true;
    
}
