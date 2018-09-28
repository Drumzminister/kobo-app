<?php
use Koboaccountant\Models\Company;
Route::get('/', 'UserController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Guest  routes
Route::group(['middle' => ['guest']], function() {

    Route::post('/register', 'UserController@create');
    Route::get('/users', 'UserController@users');
    Route::get('/message', 'UserController@message');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/logout', 'UserController@logout');
    Route::get('/accountant', 'UserController@accountant');

});

// Admin routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/client', 'UserController@client');
    Route::get('/dashboard', 'DashboardController@index');
    Route::post('/company', 'CompanyController@store')->name('company');
    Route::get('/company/{company}', 'CompanyController@index')->name('dashboard');
});




