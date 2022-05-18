<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MealController;
use App\Http\Controllers\API\OrderController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'App\Http\Controllers\API\RegisterController@register');
Route::post('login', 'App\Http\Controllers\API\RegisterController@login');


Route::middleware(['auth:api'])->group(function () {

    Route::apiResource('discount',DiscountController::class);
    Route::apiResource('cate',CategoryController::class);
    Route::apiResource('meal',MealController::class);
    Route::apiResource('order',OrderController::class);

});