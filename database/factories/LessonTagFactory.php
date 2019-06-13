<?php

use Faker\Generator as Faker;
use App\Model\Lesson;

$factory->define(DB::table('lesson_tag'), function (Faker $faker) {
    $tags=App\Model\Tag::all();

    return [
        \App\Model\Lesson::all()->each(function (\App\Model\Lesson $lesson) use ($tags) { 
            $lesson->tags()->attach(
                $tags->random(rand(1, 10))->pluck('id')->toArray()
            ); 
        })
    ];
});
