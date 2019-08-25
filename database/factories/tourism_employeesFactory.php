<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tourism_employees;
use Faker\Generator as Faker;

$factory->define(tourism_employees::class, function (Faker $faker) {

    return [
        'tourism_dest_id' => $faker->randomDigitNotNull,
        'nama' => $faker->word,
        'tgl_lahir' => $faker->word,
        'jk' => $faker->randomElement(['Male', 'Female']),
        'alamat' => $faker->text,
        'tel' => $faker->word,
        'email' => $faker->word,
        'jabatan' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
