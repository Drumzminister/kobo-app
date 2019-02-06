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


//use PDF;

Route::group([ 'prefix' => 'client'], function () {
    // The controllers live in src/Services/Client/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function () {

	    $html = view('client::pdf.invoice')->render();
	    $pdf = \Illuminate\Support\Facades\App::make('snappy.pdf.wrapper');
//	    $pdf->loadHTML($html);
//	    return $pdf->inline();
	    $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0);
	    return $pdf->inline();
    });

    Route::get('{userId}/banks', 'BankDetailController@listBanks')->name('client.banks');
    Route::post('/new-bank', 'BankDetailController@addBankDetail')->name('client.new-bank');
    Route::post('/bank-update/{detailId}', 'BankDetailController@updateBankDetail')->name('client.update-bank');
    Route::get('/bank/delete/{detailId}', 'BankDetailController@deleteBankDetail')->name('client.delete-bank');

	Route::post('/sale', 'SaleController@addSale')->name('client.sale.add');
	Route::get('/sale/list', 'SaleController@listSales')->name('client.sale.list');
	Route::post('/sale/update/{saleId}', 'SaleController@updateSale')->name('client.sale.update');
	Route::post('/sale/delete/{saleId}', 'SaleController@deleteSale')->name('client.sale.delete');

    Route::get('/rent', "RentController@showRentPage")->name('client.rent.show');
    Route::get('/rent/all', 'RentController@showAllRents')->name('client.rent.show-all');
    Route::post('/rent/add', 'RentController@addRent')->name('client.rent.add');
    Route::get('/rent/list', 'RentController@listRent')->name('client.rent.list');
    Route::post('/rent/update/{rentId}', 'RentController@updateRent')->name('client.rent.update');
    Route::get('/rent/search/{param}', 'RentController@searchRent')->name('client.rent.search');
    Route::post('/rent/{rentId}/pay', 'RentController@payRent')->name('client.rent.pay');

	Route::get('/loans', 'LoanController@show')->name('client.loan.show');
	Route::get('/loans/all', 'LoanController@index')->name('client.loan.all');
	Route::post('/loan/add', 'LoanController@addLoan')->name('client.loan.add');
	Route::get('/loan/list', 'LoanController@listLoan')->name('client.loan.list');
	Route::post('/loan/{loanId}/pay', 'LoanController@payLoan')->name('client.loan.pay');
	Route::get('/loan/{loanId}/payments', 'LoanController@listPayments')->name('client.loan.payments');
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
    Route::post('/inventory/{invendoryId}/delete', 'InventoryController@deleteInventory')->name('client.inventory.delete');

    Route::get('/staff', 'StaffController@showStaff')->name('client.staff.show');
    Route::get('/staff/single-staff', 'StaffController@showSingleStaff')->name('client.single-staff.add');
    Route::get('/staff/multiple-staff', 'StaffController@showMultipleStaff')->name('client.single-staff.add');
    Route::post('/staff/single-staff/add', 'StaffController@addSingleStaff')->name('client.single-staff.add');
    Route::post('/staff/multiple-staff/add', 'StaffController@addMultipleStaff')->name('client.multiple-staff.add');

    Route::get('/staff/search', 'StaffController@searchStaff')->name('client.staff.search');
    Route::post('staff/imageUpload', 'StaffController@imageUpload')->name('client.staffImageUpload');

    Route::get('/customer', 'CustomerController@index')->name('client.customer');
    Route::get('/customer/add', 'CustomerController@showCustomer')->name('client.customer.add');
    Route::post('/customer/add', 'CustomerController@addCustomer')->name('client.customer.add');
    Route::get('/customer/list', 'CustomerController@listAllCustomers')->name('client.customer.list');
    Route::get('/customer/all-customers', 'CustomerController@allCustomers')->name('client.customer.all');
    Route::get('/customer/search', 'CustomerController@searchCustomers')->name('client.customer.search');
    Route::post('/customer/uploadCsv', 'CustomerController@handleCsvUpload')->name('upload-multiple-customer');
    Route::post('/customer/delete/{customerId}', 'CustomerController@deleteCustomer')->name('delete.customer');



    // Sale Routes
	Route::get('/sales', 'ClientDashboardController@showSalesPage')->name('company.sales');
	Route::get('/{slug}/add-sale', 'ClientDashboardController@showAddSalesPage')->name('show.add.sale');
	Route::get('/sale/{saleId}', 'ClientDashboardController@showSaleCreationPage')->name('sale.create');
	Route::post('/sale/{saleId}', 'ClientDashboardController@showSaleCreationPage')->name('sale.create');
//	Route::post('/sale/{saleId}/add-item', 'ClientDashboardController@addSaleItem')->name('sale.add.item');
//	Route::get('/all-sales/{slug}', 'ClientDashboardController@showSalesPage')->name('company.all-sales');

	Route::get('/saleItem/delete/{itemId}', 'ClientDashboardController@showSalesPage')->name('company.all-sales');

    Route::get('/expenses', "ExpensesController@showExpensePage")->name('client.expenses.show');
    Route::get('/expenses/all', 'ExpensesController@showAllExpenses')->name('client.expenses.show-all');
    Route::get('/expenses/add', 'ExpensesController@showAddExpensePage')->name('client.expenses.add');
    Route::post('/expenses/add', 'ExpensesController@addExpense')->name('client.expenses.add');
    Route::get('/expenses/list', 'ExpensesController@listExpenses')->name('client.expenses.list');
    Route::post('/expenses/update/{expenseId}', 'ExpensesController@updateExpense')->name('client.expenses.update');
    Route::get('/expenses/search/{param}', 'ExpensesController@searchExpense')->name('client.expenses.search');
    Route::post('/expenses/{expenseId}/pay', 'ExpensesController@payExpense')->name('client.expenses.pay');

    Route::get('/vendor', 'VendorController@showVendorPage')->name('vendor.index');
    Route::get('/vendor/list', 'VendorController@showAllVendor')->name('vendor.show');
    Route::get('/vendor/add', 'VendorController@addVendorPage')->name('vendor.add');
    Route::post('/vendor/add', 'VendorController@addVendor')->name('vendor.add');
    Route::get('/vendor/all-vendors', 'VendorController@listVendors')->name('vendor.list');
    Route::get('/vendor/search', 'VendorController@searchVendors')->name('vendor.search');
    Route::post('/vendor/{vendorId}/activate', 'VendorController@activateVendor')->name('vendor.activate');

    Route::get('/creditors', 'CreditorController@showCreditorPage')->name('creditor.index');
    Route::get('/creditors/creditor', 'CreditorController@showSingleCreditorPage')->name('creditor.credit');
    Route::get('/creditors/all', 'CreditorController@showAllCreditor')->name('creditor.show-all');

    Route::get('/debtors', 'DebtorsController@showDebtorsPage')->name('debtor.index');
    Route::get('/debtors/debtor', 'DebtorsController@showSingleDebtorPage')->name('debtor.debt');
    Route::get('/debtors/all', 'DebtorsController@showAllDebtorsPage')->name('debtor.show-all');

    Route::get('/opening-pages', 'OpeningPagesController@showOpeningPages')->name('opening-pages.index');

    Route::get('/bank', 'BankPagesController@showBankPages')->name('bank.banking-page');
    Route::post('/bank', 'BankDetailController@addBankDetail')->name('bank.add');
    Route::patch('/bank', 'BankDetailController@updateBankDetail')->name('bank.update');

    Route::get('/product/add', 'ProductController@addProductPage')->name('add-product');
    Route::post('/product/add-product', 'ProductController@addProduct')->name('add-product');
    Route::post('/product/add-product-image', 'ProductController@addProductImage')->name('add-product-image');

});
Route::get('/dashboard', 'ClientDashboardController@index')->name('client.dashboard');
Route::get('/bar/{slug}', 'ClientDashboardController@testFeature');
Route::get('/view/accountant', 'ClientDashboardController@viewAccountant');
