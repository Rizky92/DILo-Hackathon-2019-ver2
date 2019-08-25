<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\investor_profiles;
use Faker\Generator as Faker;

$factory->define(investor_profiles::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'address' => $faker->text,
        'coords' => $faker->text,
        'ceo_name' => $faker->word,
        'email' => $faker->word,
        'tel' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
