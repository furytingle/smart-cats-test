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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('car')->as('car.')->group(function () {
    Route::get('brands', 'CarController@getBrands')->name('brands');

    Route::get('search', 'CarController@search')->name('search');

    Route::get('create', 'CarController@create')->name('create');
    Route::post('create', 'CarController@store')->name('store');
});

Event::listen('illuminate.query',function($query){
    var_dump($query);
});