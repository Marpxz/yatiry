<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Scoreboard;
use Faker\Generator as Faker;

$factory->define(Scoreboard::class, function (Faker $faker) {
    return [
        'score' => $faker->numberBetween(500, 1000),
        'college_id' => 954065
    ];
});
