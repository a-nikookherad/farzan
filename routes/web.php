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

Route::get('/', function () {
    return view('welcome');
});


Route::group(["prefix" => "/motorbike", "namespace" => "admin"], function () {
    Route::get('/index', 'motorbikeController@index')->name('motorbike.list');
    Route::post('/store', 'motorbikeController@store')->name('motorbike.store')->middleware("admin");
    Route::post('/update/{id}', 'motorbikeController@update')->name('motorbike.update');
    Route::post('/delete', 'motorbikeController@delete')->name('motorbike.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
