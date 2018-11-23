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

Route::get('/dashboard','DashboardController@index');

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/expenses', function () {
    return view('expenses');
});

Route::get('/assets', function () {
    return view('opening-asset');
});

Route::get('/debtors', function () {
    return view('opening-debtors');
});

Route::get('/creditors', function () {
    return view('opening-creditors');
});

Route::get('/accountant/dashboard', function () {
    return view('account-dashboard');
});



Route::get('/loans', function () {
    return view('loans');
});


Route::get('/clients', function () {
    return view('clients');
});

Route::get('/started', 'PaymentController@index');

Auth::routes();
// Guest  routes
Route::group(['middle' => ['guest']], function() {
    // Landing Page
    Route::get('/', 'UserController@home');

    //Registration Steps
    Route::post('/register', 'UserController@create');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/started', 'UserController@started');
    Route::get('/login', 'UserController@login')->name('login');
    Route::get('/logout', 'UserController@logout');
    Route::get('/started', 'PaymentController@index');
    Route::get('plans','PaymentController@getAllPlans');

    // Guest accountant routes
    Route::get('/accountant', 'UserController@accountant');
});


// Auth routes
// Route::group(['middleware' => 'auth'], function () {
    Route::get('/payment/success', 'PaymentController@paid');

    Route::get('/dashboard','DashboardController@index');

    Route::get('/sales', 'SalesController@index');
    
    // Route::prefix('sales')->group(function () {
        Route::get('/addSales', 'SalesController@sales');  
        Route::get('/getCustomers', 'SalesController@getCustomer');
        
    // });
    Route::get('/expenses', 'ExpensesController@index');
    Route::get('/assets', 'AssetController@openingAsset');
    Route::get('/debtors', 'DebtorController@index');
    Route::get('/creditors', 'CreditorController@index');
    Route::post('updateFirstTimeLogin', 'UserController@upDateFirstTimeVisit');
// });



// Accountant rotes 
// Route::group(['middleware' => ''], function() {
    Route::get('/accountant/dashboard', 'AccountantController@index');
// });


