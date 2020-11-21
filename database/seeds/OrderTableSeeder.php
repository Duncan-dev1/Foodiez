<?php

use Illuminate\Database\Seeder;
use App\OrderItem;
use App\FoodItem;
use App\Order;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Order::class, 15)->create()->each(function ($order,$food_item) {
         //create 5 orderitems for each order
         factory(OrderItem::class, 5)->create(['order_id'=>$order->id,
         'food_item_id'=> function() {
         return factory(App\FoodItem::class)->create()->id;
         },
         ]);//->each(function ($order_item){
             //create 5 fooditems for each orderitem
            // factory(FoodItem::class, 5)->create(['food_item_id'=>$order_item->id]);
        // });
         });
    }
}
/* factory(Order::class, 15)->create()->each(function ($order) {
//create 5 orderitems for each order
factory(OrderItem::class, 5)->create(['order_id'=>$order->id,
'food_item_id'=> function() {
return factory(App\FoodItem::class)->create()->id;
},
]);//->each(function ($order_item){
//create 5 fooditems for each orderitem
// factory(FoodItem::class, 5)->create(['food_item_id'=>$order_item->id]);
// });
}); */
