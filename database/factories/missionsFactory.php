<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\missions;
use Faker\Generator as Faker;

$factory->define(missions::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'length' => $faker->randomDigitNotNull,
        'points' => $faker->randomDigitNotNull,
        'mission_key' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
