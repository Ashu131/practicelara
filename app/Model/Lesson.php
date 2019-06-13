<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable=    ['title', 'body'];

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag', 'lesson_tag','lesson_id','tag_id');
    }   
}
