<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_destinations;
use Faker\Generator as Faker;

$factory->define(tourism_destinations::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'owner' => $faker->word,
        'tourism_dest_cat_id' => $faker->randomDigitNotNull,
        'address' => $faker->text,
        'coords' => $faker->text,
        'email' => $faker->word,
        'tel' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
