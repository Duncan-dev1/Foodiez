<?php

namespace App\Http\Controllers;
use App\FoodItem;
use App\OrderItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Return FoodItem::all();
       // Return FoodItem::where('order_id',2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /* $validatedData = $request->validate([
            'food_name' =>'required|string|max:191',
            'description' => 'required|string|email|max:191',
            'price'=>'required|integer|max:6',
            'quantity'=>'required|string|max:6',
            'image'=>'nullable|string|max:6',
            ]);
*/
            return FoodItem::create([
            'food_name'=>$request['food_name'],
            'category_id'=>$request['category_id'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'quantity'=>$request['quantity'],
            'image'=>$request['image'],
         
            ]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singlefood_item=Food::find($id);
        return $singlefood_item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
