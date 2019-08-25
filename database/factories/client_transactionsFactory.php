<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\client_transactions;
use Faker\Generator as Faker;

$factory->define(client_transactions::class, function (Faker $faker) {

    return [
        'client_user_id' => $faker->randomDigitNotNull,
        'tourism_serv_prod_id' => $faker->randomDigitNotNull,
        'time' => $faker->word,
        'quantity' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
