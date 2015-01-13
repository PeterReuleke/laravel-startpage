<?php

// index
Route::get('/', [
	'uses' => 'HomeController@index' 
]);

// changing the position of a box
Route::patch('Box/{id}', [
	'uses' => 'BoxController@update' 
]);
