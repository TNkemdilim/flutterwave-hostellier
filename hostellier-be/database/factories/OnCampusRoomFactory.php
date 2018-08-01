<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OnCampusRoom::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'hall_name' => $faker->firstname,
        'hall_location' => $faker->city,
        'description' => $faker->text($maxNbChars = 300),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8),
        'students_per_room' => $faker->randomDigitNotNull,
        'picture' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
