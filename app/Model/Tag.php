<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable= ['name'];
    
    public function lessons()
    {
        return $this->belongsToMany('App\Model\Lesson', 'lesson_tag', 'tag_id', 'lesson_id');
    }
}
