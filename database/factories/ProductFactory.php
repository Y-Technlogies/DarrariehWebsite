<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text(25),
        'price' => $faker->randomNumber(5),
        'images' => "[\"products/106579888_742647636504237_7955856466431444308_n.jpg\"]",
        'size' => "{\"1\":\"1\",\"2\":\"2\",\"3\":\"3\",\"4\":\"4\"}"
    ];
});
