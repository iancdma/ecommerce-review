<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;

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

Route::get('/canindexcategories', function (Request $request) {
    return response()->json("okay");
});

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');

    Route::get('categories', 'CategoryController@index')->middleware('scope:index-categories');
    Route::post('categories', 'CategoryController@store')->middleware('scope:store-categories');
    Route::get('categories/{category}', 'CategoryController@show')->middleware('scope:show-categories');
    Route::put('categories/{category}', 'CategoryController@update')->middleware('scope:update-categories');
    Route::delete('categories/{category}', 'CategoryController@destroy')->middleware('scope:delete-categories');

    Route::get('products', 'ProductController@index')->middleware('scope:index-products');
    Route::post('products', 'ProductController@store')->middleware('scope:store-products');
    Route::get('products/{product}', 'ProductController@show')->middleware('scope:show-products');
    Route::put('products/{product}', 'ProductController@update')->middleware('scope:update-products');
    Route::delete('products/{product}', 'ProductController@destroy')->middleware('scope:delete-products');

    Route::get('orders', 'OrderController@index')->middleware('scope:index-orders');
    Route::post('orders', 'OrderController@store')->middleware('scope:store-orders');
    Route::get('orders/{order}', 'OrderController@show')->middleware('scope:show-orders');
    Route::put('orders/{order}', 'OrderController@update')->middleware('scope:update-orders');
    Route::delete('orders/{order}', 'OrderController@destroy')->middleware('scope:delete-orders');

    Route::get('users', 'UserController@index')->middleware('scope:index-users');
    Route::post('users', 'UserController@store')->middleware('scope:store-users');
    Route::get('users/{user}', 'UserController@show')->middleware('scope:show-users');
    Route::put('users/{user}', 'UserController@update')->middleware('scope:update-users');
    Route::delete('users/{user}', 'UserController@destroy')->middleware('scope:destroy-users');
});
