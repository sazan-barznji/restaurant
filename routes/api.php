<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MealController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RestaurantController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'App\Http\Controllers\API\RegisterController@register');
Route::post('login', 'App\Http\Controllers\API\RegisterController@login');

    Route::apiResource('discount',DiscountController::class);
    Route::apiResource('cate',CategoryController::class);
    Route::apiResource('meal',MealController::class);
    Route::apiResource('order',OrderController::class);
    Route::apiResource('rest',RestaurantController::class);
    // Route::get('meal', 'App\Http\Controllers\API\MealController@image');
// Route::middleware(['auth:api'])->group(function () {

//     // Route::apiResource('discount',DiscountController::class);
//     // Route::apiResource('cate',CategoryController::class);
//     // Route::apiResource('meal',MealController::class);
//     // Route::apiResource('order',OrderController::class);

// });