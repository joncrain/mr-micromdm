<?php

// Database seeder
// Please visit https://github.com/fzaninotto/Faker for more options

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Micromdm_model::class, function (Faker\Generator $faker) {

    return [
        'mdm_enrollment_status' => $faker->boolean(),
        'dep_enrollment_status' => $faker->boolean(),
        'micromdm_version' => $faker->randomNumber($nbDigits = 8, $strict = false),
    ];
});
