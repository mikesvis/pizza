<?php

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

Route::resource('/pizza', 'PizzaController')->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('/slide', 'SlideController@index');

Route::get('/currency', 'CurrencyController@index');

Route::get('/basket', 'BasketController@index');

Route::post('/order', 'OrderController@create');

Route::get('/order/{order}', 'OrderController@show');
