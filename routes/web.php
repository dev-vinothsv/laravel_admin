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


#Auth::routes();
Route::get('auth/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::post('auth/login', 'Auth\LoginController@login');



/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin'], function() {
	# Admin Dashboard
	Route::get('/dashboard', 'Admin\DashboardController@index');

	Route::get('/users', 'Admin\UserController@index');
	Route::get('/users/create', 'Admin\UserController@Create');
	Route::post('/users/create', 'Admin\UserController@createProcess');
	Route::get('/users/{id}/edit', 'Admin\UserController@edit');
	Route::post('/users/{id}/edit', 'Admin\UserController@editProcess');
	Route::get('/users/{id}/delete', 'Admin\UserController@delete');
	Route::post('/users/delete', 'Admin\UserController@deleteProcess');
	Route::get('/users/{id}/activate', 'Admin\UserController@getActivate');
	Route::get('/users/data', 'Admin\UserController@data');		
});
	
