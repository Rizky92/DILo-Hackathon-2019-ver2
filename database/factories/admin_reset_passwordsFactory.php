<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\admin_reset_passwords;
use Faker\Generator as Faker;

$factory->define(admin_reset_passwords::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'reset_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
