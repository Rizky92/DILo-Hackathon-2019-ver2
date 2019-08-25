<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_event_committees;
use Faker\Generator as Faker;

$factory->define(tourism_event_committees::class, function (Faker $faker) {

    return [
        'tourism_event_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'role' => $faker->word,
        'tel' => $faker->word,
        'email' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
