<?php

use Faker\Generator as Faker;
use App\Model\Lesson;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'body'  => $faker->text(),
        'some_bool' => $faker->boolean()
    ];
});
