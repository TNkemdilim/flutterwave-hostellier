<?php

use Faker\Generator as Faker;

$appUrl = env('APP_URL');
$flatTypes = [
    "Single Bedroom",
    "Double Bunk",
    "Single Bunk",
    "Storey Building"
];

$dummyDescriptions = [
    'A rooom convenient enough to meet all of your needs.',
    "A best fit for students to enjoy the semester.",
    "This is the best room any one could ever have, and live in as a student."
];

$factory->define(
    App\Models\OffCampusRoom::class,
    function (Faker $faker) use (&$appUrl, &$flatTypes, &$dummyDescriptions) {
        return [
            'title' => $faker->numberBetween($min = 1, $max = 4) . ' ' . $flatTypes[$faker->numberBetween(
                $min = 0,
                $max = sizeof($flatTypes) - 1
            )],
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'description' => $dummyDescriptions[$faker->numberBetween(
                $min = 0,
                $max = sizeof($dummyDescriptions) - 1
            )],
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5000, $max = 300000),
            'picture' => $appUrl . '/api/v1/images/' . $faker->numberBetween($min = 1, $max = 10),
        ];
    }
);
