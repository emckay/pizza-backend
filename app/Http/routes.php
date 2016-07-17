<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('toppings', 'ToppingsController@index');

Route::model('pizzas', 'App\Pizza');
Route::resource('pizzas', 'PizzasController',
                ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
