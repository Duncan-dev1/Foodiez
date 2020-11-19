<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FoodItem;
use Faker\Generator as Faker;

$factory->define(FoodItem::class, function (Faker $faker) {
    return [
         'food_name' => $faker->text($maxNbChars = 15) ,
        // 'foodcategory_id'=>$faker->randomDigit,
         'image'=>$faker->imageUrl($width = 640, $height = 480),
         'price' => $faker->numberBetween($min = 10, $max = 1000),

         'description' => $faker->text($maxNbChars = 30),
         'quantity' => $faker->numberBetween($min = 1, $max = 100),
         'category_id'=> function() {
         return factory(App\FoodCategory::class)->create()->id;
         },
    ];
});
