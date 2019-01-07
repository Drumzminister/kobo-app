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

	Route::post('/sale/add', 'SaleController@addSale')->name('client.sale.add');
	Route::get('/sale/list', 'SaleController@listSales')->name('client.sale.list');
	Route::post('/sale/update/{saleId}', 'SaleController@updateSale')->name('client.sale.update');
	Route::post('/sale/delete/{saleId}', 'SaleController@deleteSale')->name('client.sale.delete');

    Route::post('/inventory/add', 'InventoryController@addInventory')->name('client.inventory.add');
    Route::get('/inventory/list', 'InventoryController@listInventory')->name('client.inventory.list');
    Route::get('/inventory/update/{inventoryId}', 'InventoryController@updateInventory')->name('client.inventory.update');
    Route::post('/inventory/delete', 'InventoryController@deleteInventory')->name('client.inventory.delete');
});
