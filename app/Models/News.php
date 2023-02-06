<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    const FOLDER_UPLOAD = 'uploads/admin/news';

    protected $table = 'news';

    protected $fillable = [
    	'title',
    	'cate_new_id',
    	'info',
    	'image',
    	'content',
    ];
    /**
     *
     * @var bool
     */
    public $timestamps = true;
}
