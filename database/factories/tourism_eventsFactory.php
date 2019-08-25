<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_events;
use Faker\Generator as Faker;

$factory->define(tourism_events::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'tourism_event_cat_id' => $faker->randomDigitNotNull,
        'event_holder_name' => $faker->word,
        'event_holder_tel' => $faker->word,
        'event_holder_email' => $faker->word,
        'date_start' => $faker->word,
        'date_end' => $faker->word,
        'quota' => $faker->randomDigitNotNull,
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
