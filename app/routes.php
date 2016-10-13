<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('namespace' => 'App\Controllers'), function()
{
    Route::match(['GET', 'POST'], 'dish/home', 'DishController@home');
    Route::resource('dish', 'DishController');
    Route::model('dish', 'App\Models\Dish');
});


Route::get('/', function () {
    return Redirect::to('dish/home');
});
