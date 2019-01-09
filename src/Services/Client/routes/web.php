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

    Route::get('/rent', "RentController@showRentPage")->name('client.rent.show');
    Route::get('/rent/all', 'RentController@showAllRents')->name('client.rent.show-all');
    Route::post('rent/add', 'RentController@addRent')->name('client.rent.add');
    Route::get('rent/list', 'RentController@listRent')->name('client.rent.list');
    Route::post('rent/update/{rentId}', 'RentController@updateRent')->name('client.rent.update');
    Route::get('rent/search/{param}', 'RentController@searchRent')->name('client.rent.search');
    Route::post('rent/{rentId}/pay', 'RentController@payRent')->name('client.rent.pay');

	Route::get('/loans', 'LoanController@show')->name('client.loan.show');
	Route::get('/loans/all', 'LoanController@index')->name('client.loan.all');
	Route::post('/loan/add', 'LoanController@addLoan')->name('client.loan.add');
	Route::get('/loan/list', 'LoanController@listLoan')->name('client.loan.list');
	Route::post('/loan/{loanId}/pay', 'LoanController@payLoan')->name('client.loan.list');
	Route::get('/loan/search/{param}', 'LoanController@searchLoan')->name('client.loan.search');
	Route::post('/loan/sources/add', 'LoanController@addSources')->name('client.loan.sources.add');
	Route::get('/loan/sources/list', 'LoanController@listSources')->name('client.loan.sources.list');
	Route::get('/loan/sources/search/{param}', 'LoanController@searchSources')->name('client.loan.sources.search');

    Route::get('inventory', 'InventoryController@showInventory')->name('client.inventory.show');
    Route::get('/inventory/single-inventory', 'InventoryController@showSingleInventory')->name('client.inventory.show-single');
    Route::get('inventory/multiple-inventory', 'InventoryController@showMultipleInventory')->name('client.inventory.show-multiple');
    Route::post('/inventory/add', 'InventoryController@addInventory')->name('client.inventory.add');
    Route::get('/inventory/list', 'InventoryController@listInventory')->name('client.inventory.list');
    Route::get('/inventory/update/{inventoryId}', 'InventoryController@updateInventory')->name('client.inventory.update');
    Route::post('/inventory/delete', 'InventoryController@deleteInventory')->name('client.inventory.delete');

    Route::get('/staff', 'StaffController@showStaff')->name('client.staff.show');
    Route::get('/staff/single-staff', 'StaffController@showSingleStaff')->name('client.single-staff.add');
    Route::get('/staff/multiple-staff', 'StaffController@showMultipleStaff')->name('client.single-staff.add');
    Route::post('/staff/single-staff/add', 'StaffController@addSingleStaff')->name('client.single-staff.add');
    Route::post('/staff/multiple-staff/add', 'StaffController@addMultipleStaff')->name('client.multiple-staff.add');

    Route::get('/customer', 'CustomerController@index')->name('client.customer');
    Route::get('/customer/add', 'CustomerController@showCustomer')->name('client.customer.add');
    Route::post('/customer/add', 'CustomerController@addCustomer')->name('client.customer.add');

    Route::get('/sales/{}', 'ClientDashboardController@showSalesPage');

	Route::get('/sales/{slug}', 'ClientDashboardController@showSalesPage')->name('company.sales');
//	Route::get('/all-sales/{slug}', 'ClientDashboardController@showSalesPage')->name('company.all-sales');
});

Route::get('/dashboard', 'ClientDashboardController@index')->name('client.dashboard');

