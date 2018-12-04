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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', 'DashboardController@index');

// sales
Route::get('/sales', function () {
    return view('sales');
});

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

Route::get('/opening/assets', 'OpeningController@showAssetsPage');
Route::post('/opening/assets', 'OpeningController@addAsset');
Route::post('/opening/assets/{id}', 'OpeningController@updateAsset');
Route::post('/opening/assets/{id}/delete', 'OpeningController@deleteAsset');

Route::get('/opening/debtors', 'OpeningController@showDebtorsPage');
Route::post('/opening/debtor', 'OpeningController@addDebtor');
Route::post('/opening/debtor/{id}', 'OpeningController@updateDebtor');
Route::post('/opening/debtor/{id}/delete', 'OpeningController@deleteDebtor');

Route::get('/opening/creditors', function () {
    return view('opening-creditors');
});

Route::get('/opening/inventory', function () {
    return view('opening-inventory');
});


// loans page
Route::get('/loans', function () {
    return view('loans');
});
Route::get('/view-loans', function () {
    return view('view-loans');
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



// accountant dashboard
Route::get('/accountant/dashboard', function () {
    return view('account-dashboard');
});

// client
Route::get('/clients', function () {
    return view('clients');
});

Route::get('/manage/clients', function () {
    return view('manage-clients');
});

Route::get('/toolkits', function () {
    return view('toolkit');
});

Route::get('/resources', function () {
    return view('resource');
});

Route::get('/chats/history', function () {
    return view('chat-history');
});

Route::get('/chats', function () {
    return view('chat');
});


use Illuminate\Http\Request;

Route::get('/started', 'PaymentController@index');

Auth::routes();
// Guest  routes
Route::group(['middle' => ['guest']], function () {
    // Landing Page
    Route::get('/', 'UserController@home');

    //Registration Steps
    Route::post('/register', 'UserController@create');
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

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/sales', 'SalesController@index');

    // Route::prefix('sales')->group(function () {
        Route::get('/addSales', 'SalesController@sales');
        Route::get('/getCustomers', 'SalesController@getCustomer');

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
Route::get('/api1', function () {
    // Auth::loginUsingId('0587c5f0-9005-3f23-aace-d0faf74f19ba');

    return view('test');
});
Route::post('/api1', function () {
    // foreach (Request::get('amount') as $update) {
    dd(request()->all());
    // }
});

Route::get('/posts', function () {
});
