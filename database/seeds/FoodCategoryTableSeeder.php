<?php

use Illuminate\Database\Seeder;
use App\FoodCategory;
use App\FoodItem;
class FoodCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
          //factory(FoodCategory::class,10)->create();
          /*
         factory(FoodCategory::class, 5)->create()->each(function ($food_category) {
         //create 5 posts for each user
         factory(FoodItem::class)->create(['category_id'=>$food_category->id]);
         });
         */
 //factory(App\FoodCategory::class, 5)->create();
 /*$food_categories = App\FoodCategory::all();
 App\FoodItem::all()->each(function ($food_item) use ($food_categories) {
 $food_item->food_category()->attach(
 $food_categories->random()->pluck('id')->toArray()
 );
 });
  */ 
  } 
}
