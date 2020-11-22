<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Order;
use App\OrderItem;
use App\Role;
class UserTableSeeder extends Seeder
{
  
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     factory(User::class,5)->create()->each(function($user){
           //create 5 orders per user
          
          factory(Order::class, 5)->create(['user_id'=>$user->id])->each(function ($order) {
          //create 5 orderitems for each order
         
                factory(OrderItem::class, 5)->create(['order_id'=>$order->id,
                'food_item_id'=> function() {
                return factory(App\FoodItem::class)->create()->id;
                },
                ]);
          });
          
          });
          factory(App\Role::class, 4)->create();
            $roles = App\Role::all();
            App\User::all()->each(function ($user) use ($roles) {
                  $user->roles()->attach(
                  $roles->random(rand(1, 3))->pluck('id')->toArray()
                  );
                  });

 
         /* factory(User::class,30)->create();
         factory(App\Role::class, 4)->create();
         $roles = App\Role::all();
         App\User::all()->each(function ($user) use ($roles) {
         $user->roles()->attach(
         $roles->random(rand(1, 3))->pluck('id')->toArray()
         );
         });  */

    }
    
}
