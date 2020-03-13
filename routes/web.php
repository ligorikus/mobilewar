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

Route::group(['middleware' => ['auth', 'village']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/farms', 'FarmController@index')->name('farms.index');
	Route::get('/map', 'MapController@index')->name('maps.index');
});

Route::group(['middleware' => ['auth', 'no_village']], function () {
	Route::get('/village/create', 'VillageController@create_first')->name('village.create.first');
});
