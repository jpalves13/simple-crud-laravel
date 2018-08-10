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

Route::get('/',               'RegisterController@dashboard');
Route::get('/view/{id}',      'RegisterController@view')->where('id', '[0-9]+');
Route::get('/add',            'RegisterController@add');
Route::post('/addAction',     'RegisterController@addAction');
Route::post('/editAction',    'RegisterController@editAction');
Route::get('/edit/{id}',      'RegisterController@edit')->where('id', '[0-9]+');
Route::post('/remove',        'RegisterController@remove');
