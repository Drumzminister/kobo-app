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
    $data = Auth::user()->firstTimeLogin();
    return view('sales', compact('data'));
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

Route::get('/started', function () {
    return view('get-started');
});



Auth::routes();



// Authentication  routes
Route::group(['middle' => ['guest']], function() {
    //Authentication routes
    Route::post('/register', 'UserController@create');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/logout', 'UserController@logout');
    Route::get('/started', 'PaymentController@index');
    
    // Guest accountant routes
    Route::get('/accountant', 'UserController@accountant');
});


// Auth routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/payment/success', 'PaymentController@paid');
});

Route::get('plans','PaymentController@getAllPlans');

// Accountant rotes 
Route::group(['middleware' => 'accountant'], function() {

});


