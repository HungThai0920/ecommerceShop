<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    const FOLDER_UPLOAD = 'uploads/admin/products';
    protected $table = 'products';

    protected $fillable = [
    	'name',
    	'category_id',
    	'supplier_id',
    	'price',
    	'sale',
    	'total',
    	'show_home',
    	'hot',
    	'view',
    	'buyed',
    	'warranty',
    	'image',
    	'thunbar',
    	'description',
    	'specifications',
    	'content',
    	'status',
    ];
    /**
     *
     * @var bool
     */
    public $timestamps = true;
}
