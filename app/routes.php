<?php


Route::get('/', [
	'uses' => 'HomeController@index' 
]);




/*
Route::resource('login', 'SessionsController@create');
Route::resource('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');







Route::resource('users', 'UsersController');
*/