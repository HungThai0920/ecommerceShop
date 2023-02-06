<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    //
    const FOLDER_UPLOAD = 'uploads/admin/slides';

    protected $table = 'slides';

    protected $fillable = [
    	'name',
    	'image',
    	'link',
    	'sort',
    	'status',
    ];
    
    public $timestamps = true;
}
