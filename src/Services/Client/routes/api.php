<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Prefix: /api/client
Route::group(['prefix' => 'client'], function() {

	Route::post('/saleItem', 'SaleItemController@addSaleItem')->name('sale.item.add');
	Route::put('/saleItem/{itemId}', 'SaleItemController@updateSaleItem')->name('sale.item.update');
	Route::delete('/saleItem/{itemId}', 'SaleItemController@deleteSaleItem')->name('sale.item.delete');

    // The controllers live in src/Services/Client/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function() {
        return response()->json(['path' => '/api/client']);
    });
    
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

});