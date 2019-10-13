<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Machine;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Machine::class, function (Faker $faker) {
    return [
        "popup_content" => $faker->sentence(15),
        "amenity" => $faker->sentence(3),
        "name" => $faker->sentence(4),
        "address" => $faker->address,
        "open_week_at" => '7:00 - 18:00',
        "open_weekend_at" => '7:00 - 16:00',
        "lat" => $faker->latitude,
        "lng" => $faker->longitude,
        "api_token" => Str::random(60),
    ];
});
