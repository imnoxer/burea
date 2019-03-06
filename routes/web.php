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

Route::get('/', 'DocumentController@index')->name('home');
Route::get('show/{id}', 'DocumentController@show')->name('show');
Route::post('create', 'DocumentController@store')->name('create');
Route::post('update/{id}', 'DocumentController@update')->name('update');
Route::delete('delete/{id}', 'DocumentController@destroy')->name('delete');
