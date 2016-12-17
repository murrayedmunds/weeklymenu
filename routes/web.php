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

Route::get('/security/', 'UsersController@enterEmail');
Route::post('/security/email-check/', 'UsersController@checkEmail');

Route::get('/security/test/', 'UsersController@securityTest');
Route::post('/security/test-check', 'UsersController@securityCheck');

Route::get('/reset/', 'UsersController@resetPassword');
Route::post('/reset/update/', 'UsersController@passwordUpdate');

Route::get('/home', 'BoardsController@loadMain');
Route::post('/home/saveboards/', 'BoardsController@saveBoard');
Route::get('/home/savemenu', 'BoardsController@saveMenu');

Route::get('/menus/', 'MenusController@loadMenus');

Route::get('/settings/', 'BoardsController@loadSettings');
Route::post('/settings/update/', 'UsersController@updateUser');
Route::get('/settings/delete-board.php', 'BoardsController@deleteBoard');

Route::get('/logout', 'BoardsController@logout');
