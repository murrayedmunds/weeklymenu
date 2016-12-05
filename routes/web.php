<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'UsersController@landing');
Route::post('/saveuser/', 'UsersController@saveUser');
Route::post('/loginvalid/', 'UsersController@loginValid');

Route::get('/home', 'BoardsController@loadMain');

Route::get('/logout', 'BoardsController@logout');
