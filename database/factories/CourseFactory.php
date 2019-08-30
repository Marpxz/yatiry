<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Yatiry\Course;
use Yatiry\Model;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'level' => 7,
        'letter' => 'A',
        'college_id' => 954065,
    ];
});
