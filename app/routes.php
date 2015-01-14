<?php

// index
Route::get('/', [
	'uses' => 'HomeController@index' 
]);
	
	
	
	
// changing menu
Route::get('Menu/{id}', [
	'uses' => 'MenuController@index' 
]);
	
	

// changing the position of a box
Route::patch('Box/{id}', [
	'uses' => 'BoxController@update' 
]);

// changing Rss Tab
Route::get('Rss/{id}', [
	'uses' => 'RssController@index' 
]);
	


// admin
Route::get('Admin/', [
	'uses' => 'AdminController@index' 
]);