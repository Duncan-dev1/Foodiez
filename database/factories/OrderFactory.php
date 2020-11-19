<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
         //'name' => $faker->name,
         'refNumber' => $faker->numberBetween($min = 1000, $max = 9000),
'name' => $faker->name,
    ];
});
