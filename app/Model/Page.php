<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name' , 'desc' , 'meta_desc' , 'meta_keywords'
    ];
}
