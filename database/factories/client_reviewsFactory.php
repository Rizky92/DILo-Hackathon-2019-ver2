<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\client_reviews;
use Faker\Generator as Faker;

$factory->define(client_reviews::class, function (Faker $faker) {

    return [
        'client_user_id' => $faker->randomDigitNotNull,
        'date' => $faker->word,
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'satisfactory_level' => $faker->randomDigitNotNull,
        'comment' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
