<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\FoodItem;
use App\Order;
use App\OrderItem;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
         //'name' => $faker->name,
         'refNumber' => $faker->numberBetween($min = 1000, $max = 9000),
         'address' => $faker->unique()->address,
          'user_id'=> function() {
          return factory(App\User::class)->create()->id;
          },
          'contact_name' => $faker->name,
          'contact_phone' => $faker->e164PhoneNumber ,
    ];
});
$factory->define(OrderItem::class, function (Faker $faker) {
return [
//'name' => $faker->name,

'food_item_id' => function() {
return factory(App\FoodItem::class)->create()->id;
},
'order_id'=> function() {
return factory(App\Order::class)->create()->id;
},
'quantity' => $faker->numberBetween($min = 10, $max = 200),

];
});
