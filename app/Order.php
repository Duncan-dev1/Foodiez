<?php

namespace App;
use App\FoodItem;
use App\OrderItem;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['category_name','contact_name','contact_phone','address'];
/*
    public function fooditems(){
    return $this->hasMany(App\FoodItem);
    }
*/public function orderitems(){
    return $this->hasMany('App\OrderItem');
}
     public function user(){
     return $this->belongsTo('App\User');
     }  
}
