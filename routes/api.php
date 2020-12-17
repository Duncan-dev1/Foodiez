<?php
use App\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::apiResources(['user'=>'Api\UserController']);
//Route::apiResources(['food'=>'Api\FoodItemController']);
//Route::get('food','api\FoodItemController@index');
//Route::delete('api/food_categories/{id}', 'FoodCategoryController@destroy');
//Route::put('food_categories/{food_category}', 'FoodCategoryController@update');
Route::resources([
'user' => 'UserController',
'food_items' => 'FoodItemController',
'food_categories' => 'FoodCategoryController',
]);
