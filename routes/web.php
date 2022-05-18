<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MealController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\DiscountController;
// use App\Http\Controllers\RestaurantController;
// use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// routes for meal
// Route::get('/meals', [MealController::class,'index'])->name('meals.index');
// Route::get('/meals/create', [MealController::class,'create'])->name('meals.create');
// Route::post('/meals/store', [MealController::class,'store'])->name('meals.store');
// Route::get('/meals/show', [MealController::class,'show'])->name('meals.show');
// Route::get('/meals/edit/{id}', [MealController::class,'edit'])->name('meals.edit');
// Route::post('/meals/update/{id}', [MealController::class,'update'])->name('meals.update');
// Route::get('/meals/destroy/{id}', [MealController::class,'destroy'])->name('meals.destroy');



// Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
// Route::get('/orders/create', [OrderController::class,'create'])->name('orders.create');
// Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
// Route::get('/orders/show', [OrderController::class,'show'])->name('orders.show');
// Route::post('/orders/edit/{id}', [OrderController::class,'edit'])->name('orders.edit');
// Route::post('/orders/update/{id}', [OrderController::class,'update'])->name('orders.update');
// Route::get('/orders/delete/{id}', 'OrderController@destroy' )->name('orders.destroy');
// Route::resource('orders', 'App\Http\Controllers\OrderController');

// //routes for Discounts
// Route::get('/discs', [DiscountController::class,'index'])->name('discs.index');
// Route::get('/discs/create', [DiscountController::class,'create'])->name('discs.create');
// Route::post('/discs/store', [DiscountController::class,'store'])->name('discs.store');
// Route::get('/discs/show', [DiscountController::class,'show'])->name('discs.show');
// Route::post('/discs/edit/{id}', [DiscountController::class,'edit'])->name('discs.edit');
// Route::post('/discs/update/{id}', [DiscountController::class,'update'])->name('discs.update');
// Route::get('/discs/delete/{id}', 'DiscountController@destroy' )->name('discs.destroy');
// Route::resource('discs', 'App\Http\Controllers\DiscountController');

// //routes for restaurant
// Route::get('/rests', [RestaurantController::class,'index'])->name('rests.index');
// Route::get('/rests/create', [RestaurantController::class,'create'])->name('rests.create');
// Route::post('/rests/store', [RestaurantController::class,'store'])->name('rests.store');
// Route::get('/rests/show', [RestaurantController::class,'show'])->name('rests.show');
// Route::post('/rests/edit/{id}', [RestaurantController::class,'edit'])->name('rests.edit');
// Route::post('/rests/update/{id}', [RestaurantController::class,'update'])->name('rests.update');
// Route::get('/rests/delete/{id}', 'RestaurantController@destroy' )->name('rests.destroy');
// Route::resource('rests', 'App\Http\Controllers\RestaurantController');


// //routes for cates 
// Route::get('/cates', [CategoryController::class,'index'])->name('cates.index');
// Route::get('/cates/create', [CategoryController::class,'create'])->name('cates.create');
// Route::post('/cates/store', [CategoryController::class,'store'])->name('cates.store');
// Route::get('/cates/show', [CategoryController::class,'show'])->name('cates.show');
// Route::post('/cates/edit/{id}', [CategoryController::class,'edit'])->name('cates.edit');
// Route::post('/cates/update/{id}', [CategoryController::class,'update'])->name('cates.update');
// Route::get('/cates/delete/{id}', 'CategoryController@destroy' )->name('cates.destroy');
// Route::resource('cates', 'App\Http\Controllers\CategoryController');
 

Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
