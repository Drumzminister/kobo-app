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

Route::get('/acct-dashboard', function () {
    return view('account-dashboard');
});

Route::get('/addSales', function () {
    return view('addSales');
});



use Illuminate\Http\Request;

Route::get('/started', 'PaymentController@index');

Route::post('webhook', function(Request $request){
    dd($request);
});

Auth::routes();



// Authentication  routes
Route::group(['middle' => ['guest']], function() {
    Route::post('/register', 'UserController@create');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/logout', 'UserController@logout');
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


