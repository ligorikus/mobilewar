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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'village', 'recounting_resources']], function () {
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/farms', 'FarmController@index')->name('farms.index');
    Route::get('/farms/{farm}', 'FarmController@view')->name('farms.view');

    Route::get('/city', 'CityController@index')->name('city.index');
    Route::get('/city/{build}', 'CityController@view')->name('city.view');

	Route::get('/map', 'MapController@index')->name('maps.index');
});

Route::group(['middleware' => ['auth', 'no_village']], function () {
	Route::get('/village/create', 'VillageController@create_first')->name('village.create.first');
});
