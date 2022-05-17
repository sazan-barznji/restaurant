<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'RegisterController@register');
Route::post('login', 'RegisterController@login');

Route::middleware(['auth:api'])->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('discounts', DiscountController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('meals', MealController::class);
    Route::resource('orders', OrderController::class);
});