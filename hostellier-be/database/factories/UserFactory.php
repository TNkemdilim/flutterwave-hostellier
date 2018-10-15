<?php

use Faker\Generator as Faker;

$factory->define(
    App\Models\User::class,
    function (Faker $faker) {
        return [
            'email' => $faker->email,
            'password' => bcrypt('secret1234')
        ];
    }
);
