<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\College;
use App\Model;
use Faker\Generator as Faker;

$factory->define(College::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'country' => 'Chile',
        'city' => 'Iquique',
    ];
});
