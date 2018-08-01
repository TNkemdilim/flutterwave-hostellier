<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OffCampusRoom::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'description' => $faker->text($maxNbChars = 300),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8),
        'picture' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
