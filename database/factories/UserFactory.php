<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Yatiry\Model;
use Yatiry\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'avatar' => 3,
        'email_verified_at' => now(),
        'password' => bcrypt('123'), // secret
        'remember_token' => str_random(10),
        'user_type' => 3, // 3 = alumno, 5 = tutor, 10 = admin
        'course_id' => $faker->numberBetween(1, 3),
        'college_id' => 954065,
    ];
});
