<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
     protected $fillable = ['food_name', 'image', 'price', 'description','quantity'];
    public function foodcategory(){
        return $this->belongsTo(App\FoodCategory);
    }
     
}
