<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup', 'UserController@create');
Route::post('auth/login', 'UserController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
	Route::post('/create_task', 'TaskController@create');
	Route::post('/delete_task/{id}', 'TaskController@destroy');
	Route::post('/update_task/{id}', 'TaskController@update');
	Route::post('/tasks', 'TaskController@index');
	Route::post('/profile', 'UserController@getAuthUser');
    Route::get('user', 'UserController@getAuthUser');
});
