<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_dest_categories;
use Faker\Generator as Faker;

$factory->define(tourism_dest_categories::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
