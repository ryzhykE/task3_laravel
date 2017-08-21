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

Route::get('/', 'IndexController@showIndex');
Route::post('/make-url', 'IndexController@postUrl');
Route::get('/{id}', 'IndexController@getRedirect');
Route::controller('auth', 'AuthController');

