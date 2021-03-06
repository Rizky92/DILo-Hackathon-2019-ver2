<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\client_users;
use Faker\Generator as Faker;

$factory->define(client_users::class, function (Faker $faker) {

    return [
        'username' => $faker->word,
        'password' => $faker->word,
        'email' => $faker->word,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
