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
use Illuminate\Routing\Router;

Route::group(['middleware' => 'cors'], function(Router $router)
{
    $router->get('toppings', 'ToppingsController@index');
    $router->model('pizzas', 'App\Pizza');
    $router->resource('pizzas', 'PizzasController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
});
