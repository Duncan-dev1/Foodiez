<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
      protected $fillable = ['category_name'];
    public function fooditems(){
        return $this->hasMany(App\FoodItem);
    }
}
