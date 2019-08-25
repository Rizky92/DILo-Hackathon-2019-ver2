<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\rewards;
use Faker\Generator as Faker;

$factory->define(rewards::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'reward_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
