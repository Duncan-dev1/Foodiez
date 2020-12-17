<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
     protected $fillable = ['food_name', 'category_id','image', 'price', 'description','quantity','units'];
    public function foodcategory(){
        return $this->belongsTo(App\FoodCategory);
    }
     
}
