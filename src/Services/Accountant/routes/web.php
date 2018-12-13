<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'accountant'], function() {

    Route::get('/register', 'AccountantRegistrationController@showNewAccountantForm')->name('register.accountant');
    Route::post('/register', 'AccountantRegistrationController@showNewAccountantForm')->name('register.accountant');

    Route::get('/clients', 'AccountantDashboardController@showClients')->name('accountant.clients');
    Route::post('/clients-review', 'AccountantDashboardController@reviewClient')->name('client.review');

});
