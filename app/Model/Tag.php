<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function videos()
    {
        return $this->belongsToMany(Video::class , 'tags_videos');
    }
}
