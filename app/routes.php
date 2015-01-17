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
	
// Admin
Route::get('Admin/', [
	'uses' => 'AdminController@index' 
]);
	
// Admin Resources
Route::get('Admin/{resource}/{id}', 'AdminController@show');	
Route::get('Admin/{resource}/{id}/create', 'AdminController@create');
Route::post('Admin/{resource}/{id}', 'AdminController@store');
Route::get('Admin/{resource}/{id}/edit', 'AdminController@edit');	
Route::patch('Admin/{resource}/{id}', 'AdminController@update');
Route::get('Admin/{resource}/{id}/delete', 'AdminController@delete');
Route::delete('Admin/{resource}/{id}', 'AdminController@destroy');


	
	
	
	
	
	
	