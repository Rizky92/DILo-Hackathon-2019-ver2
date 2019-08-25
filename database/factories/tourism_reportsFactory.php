<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_reports;
use Faker\Generator as Faker;

$factory->define(tourism_reports::class, function (Faker $faker) {

    return [
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'target' => $faker->randomDigitNotNull,
        'num_of_res' => $faker->randomDigitNotNull,
        'num_of_visits' => $faker->randomDigitNotNull,
        'income' => $faker->randomDigitNotNull,
        'costs' => $faker->randomDigitNotNull,
        'profit' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
