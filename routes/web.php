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

Route::get('/', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::group(['middleware' => ['admin']], function () {
    //
});

// Client routes
Route::group(['middleware' => ['client']], function () {
    //
});

// Accountant routes
Route::group(['middleware' => ['accountant']], function () {
    //
});

Route::post('/register', 'UserController@create');