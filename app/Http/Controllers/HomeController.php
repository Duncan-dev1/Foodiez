<?php

namespace App\Http\Controllers;
use App\FoodItem;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fooditems=FoodItem::all();
        $users = User::where('id', 7)->get();
    
        return view('home')->with('fooditems',$fooditems)->with('users',$users);
        //return view('home');
    }
    public function about()
    {
    return view('about');
    }
}
