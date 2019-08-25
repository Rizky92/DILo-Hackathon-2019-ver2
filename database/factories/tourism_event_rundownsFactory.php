<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_event_rundowns;
use Faker\Generator as Faker;

$factory->define(tourism_event_rundowns::class, function (Faker $faker) {

    return [
        'tourism_event_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'time' => $faker->word,
        'presenter' => $faker->word,
        'misc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
