<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text(25),
        'price' => $faker->randomNumber(5),
        'images' => function() use ($faker) {
            return "[products\\".$faker->image(storage_path('app/public/products'), 200,200, null ,false)."]";
        },
        'size' => "{\"1\":\"1\",\"2\":\"2\",\"3\":\"3\",\"4\":\"4\"}",
        'product_code' => rand(10000, 99999),
        'suitable_age' => rand(0,100)
    ];
});
