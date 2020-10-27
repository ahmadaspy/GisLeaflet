<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\kategori;
use App\Model;
use Faker\Generator as Faker;

$factory->define(kategori::class, function (Faker $faker) {
    return [
        'kategori' => $faker->company,
        'color' => $faker->hexColor,
    ];
});
