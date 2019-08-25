<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\client_bookmarks;
use Faker\Generator as Faker;

$factory->define(client_bookmarks::class, function (Faker $faker) {

    return [
        'client_user_id' => $faker->randomDigitNotNull,
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'date' => $faker->word,
        'title' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
