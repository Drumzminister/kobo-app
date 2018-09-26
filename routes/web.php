<?php
Route::get('/', 'UserController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Admin routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/client', 'UserController@client');
});
// Client routes
Route::group(['middleware' => ['client']], function () {
});
// Accountant routes
Route::group(['middleware' => ['accountant']], function () {
});
Route::post('/register', 'UserController@create');
Route::get('/users', 'UserController@users');
Route::get('/message', 'UserController@message');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/accountant', 'UserController@accountant');

Route::post('/company', 'CompanyController@store')->name('company');