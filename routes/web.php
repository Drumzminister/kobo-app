<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', 'DashboardController@index');



Route::get('/View/Sales', function () {
    return view('view-sales');
});

// expense
Route::get('/expenses', function () {
    return view('expenses');
});
Route::get('/addExpenses', function () {
    return view('addExpenses');
});

Route::get('/view-expenses', function () {
    return view('view-expenses');
});

/*
 *  Opening Matters
 */

Route::prefix('opening')->group(function () {
    Route::get('/assets', 'OpeningController@showAssetsPage');
    Route::post('/assets', 'OpeningController@addAsset');
    Route::post('/assets/{id}', 'OpeningController@updateAsset');
    Route::post('/assets/{id}/delete', 'OpeningController@deleteAsset');

    Route::get('/debtors', 'OpeningController@showDebtorsPage');
    Route::post('/debtor', 'OpeningController@addDebtor');
    Route::post('/debtor/{id}', 'OpeningController@updateDebtor');
    Route::post('/debtor/{id}/delete', 'OpeningController@deleteDebtor');

    Route::get('/creditors', 'OpeningController@showCreditorsPage');
    Route::post('/creditors', 'OpeningController@addCreditor');
    Route::post('/creditor/{id}', 'OpeningController@updateCreditor');
    Route::post('/creditor/{id}/delete', 'OpeningController@deleteCreditor');

    Route::get('/inventory', 'OpeningController@showInventoriesPage');
    Route::post('/inventory', 'OpeningController@addInventory');
    Route::post('/inventory/{id}', 'OpeningController@updateInventory');
    Route::post('/inventory/{id}/delete', 'OpeningController@deleteInventory');

    Route::get('/cash', 'OpeningController@showCashPage');
    Route::post('/cash', 'OpeningController@addCash');
});
// inventory pages
Route::get('/inventory', 'InventoryController@index');
Route::get('/view-inventory', 'InventoryController@View');
Route::get('/single-inventory','InventoryController@singleView');
Route::get('/multiple-inventory', 'InventoryController@multiView');
Route::get('/getInventory', 'InventoryController@getInventory');


Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/view-inventory', function () {
    return view('view-inventory');
});

Route::get('/single-inventory', function () {
    return view('single-inventory');
});

Route::get('/multi-inventory', function () {
    return view('multi-inventory');
});

// staff pages
Route::get('/staffs', function () {
    return view('staffs');
});
Route::get('/add-staff', function () {
    return view('add-staff');
});
Route::get('/pay-staff', function () {
    return view('pay-staff');
});

// rent pages
Route::prefix('rent')->group(function () {
    Route::get('/', 'RentController@show');
    Route::post('/', 'RentController@store');
    Route::get('/all', 'RentController@index');
    Route::post('/rent/{id}/add-payment-method', 'RentController@addPaymentMethods');
});


/*
 *   Loan Matters
 */
Route::prefix('loans')->group(function () {
    Route::get('/', 'LoanController@overview');
    Route::post('/', 'LoanController@store');
    Route::get('/all', 'LoanController@index');
    Route::get('/get', 'LoanController@getLoans');
    Route::get('/search', 'LoanController@search');
    Route::get('/paginated', 'LoanController@paginated');
    Route::get('/sources/all', 'LoanController@getAllSources');
    Route::get('/running/count', 'LoanController@sumAllRunning');
    Route::get('/completed/count', 'LoanController@sumAllPaid');
    Route::get('/owing/count', 'LoanController@sumAllOwing');
    Route::get('/sources/{query}', 'LoanController@searchForSource');
    Route::post('/sources', 'LoanController@addSource');
    Route::post('/payment', 'LoanController@makePayment');
    Route::get('/{loan}', 'LoanController@show');
    Route::get('/{loan}/payments', 'LoanController@getPayments');
});


// debtor
Route::get('/debtor', function () {
    return view('debtors');
});

Route::get('/debt', function () {
    return view('debt');
});

Route::get('/view-debtor', function () {
    return view('view-debtor');
});

// creditors
Route::get('/creditor', function () {
    return view('creditors');
});

Route::get('/credit', function () {
    return view('credit');
});

Route::get('/view-creditor', function () {
    return view('view-creditor');
});
// vendors page
Route::get('/vendors', 'VendorController@index');
Route::get('/add-vendors', 'VendorController@addVendor');
Route::get('/view-vendors', 'VendorController@view');
Route::post('/vendor/create', 'VendorController@store');
Route::post('/vendor/{id}/activate', 'VendorController@activate');
Route::get('/vendor/search', 'VendorController@search');




// Customers page
Route::get('/customers', function () {
        return view('customers');
    });

Route::get('/add-customers', function () {
        return view('add-customers');
    });

Route::get('/view-customers', function () {
        return view('view-customers');
    });


// accountant dashboard
Route::get('/accountant/dashboard', function () {
        return view('accountant.account-dashboard');
    });


    
   // client
Route::get('/clients', function () {

        return view('accountant.clients');
    });

Route::get('/manage/clients', function () {
        return view('accountant.manage-clients');
    });

Route::get('/toolkits', function () {
        return view('acccountant.toolkit');
    });

Route::get('/resources', function () {
        return view('accountant.resource');
    });

Route::get('/chats/history', function () {
        return view('accountant.chat-history');
    });

Route::get('/chats', function () {
        return view('accountant.chat');
    });

    Route::get('/npv', function () {
        return view('accountant.npv');
    });

    Route::get('/profile', function () {
        return view('accountant.client-profile');
    });


Route::get('/started', 'PaymentController@index');

Auth::routes();
// Guest  routes
Route::group(['middle' => ['guest']], function () {
        // Landing Page
        Route::get('/', 'UserController@home');

        //Registration Steps
        Route::post('/register', 'UserController@create')->name('register');
        Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
        Route::get('/started', 'UserController@started');
        Route::get('/login', 'UserController@login')->name('login');
        Route::get('/logout', 'UserController@logout');
        Route::get('/started', 'PaymentController@index');
        Route::get('plans', 'PaymentController@getAllPlans');

        // Guest accountant routes
        Route::get('/accountant', 'UserController@accountant');
    });

// Auth routes
// Route::group(['middleware' => 'auth'], function () {
Route::get('/payment/success', 'PaymentController@paid');

Route::get('/dashboard', 'DashboardController@index')->name('client.dashboard');

Route::get('/sales', 'SalesController@index');
Route::get('/getSalesChannels', 'SalesChannelsController@getAll');
// Route::prefix('sales')->group(function () {
Route::get('/addSales', 'SalesController@sales');
Route::get('/getCustomer', 'CustomerController@allUserCustomers');
Route::post('/sales/create', 'SalesTransactionController@store');

// });
Route::get('/expenses', 'ExpensesController@index');
Route::get('/assets', 'OpeningController@showAssetsPage');
Route::get('/debtors', 'DebtorController@index');
Route::get('/creditors', 'CreditorController@index');
Route::post('updateFirstTimeLogin', 'UserController@upDateFirstTimeVisit');
// });

// Accountant rotes
// Route::group(['middleware' => ''], function() {
Route::get('/accountant/dashboard', 'AccountantController@index');
// });
Route::post('/expenses/create', 'ExpensesController@store');

Route::get('/getClientId', 'ClientController@getId');
Route::get('/allBanks', 'ClientController@getBanks');

// opening pages
Route::get('/opening/cash', function () {
    return view('opening-cash');
});

// Bank reconciiation pages
Route::get('/bank-reconciliation', function () {
    return view('bank.index');
});

// Banking pages
Route::get('/banking', 'BankingController@index');
Route::get('/banks/search', 'BankingController@search');
Route::post('/banking/transfer', 'BankingController@makeTransfer');
Route::get('/banking/payment_modes', 'PaymentMethodController@get');

