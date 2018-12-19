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

Route::group(['prefix' => 'client'], function () {
    // The controllers live in src/Services/Client/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function () {
        return view('client::welcome');
    });

    Route::get('{userId}/banks', 'BankDetailController@listBanks')->name('client.banks');
    Route::post('/new-bank', 'BankDetailController@addBankDetail')->name('client.new-bank');
    Route::post('/bank-update/{detailId}', 'BankDetailController@updateBankDetail')->name('client.update-bank');
    Route::get('/bank/delete/{detailId}', 'BankDetailController@deleteBankDetail')->name('client.delete-bank');
});
