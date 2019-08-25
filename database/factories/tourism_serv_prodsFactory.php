<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_serv_prods;
use Faker\Generator as Faker;

$factory->define(tourism_serv_prods::class, function (Faker $faker) {

    return [
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'tourism_serv_prod_cat_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'is_available' => $faker->word,
        'tel' => $faker->word,
        'email' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
