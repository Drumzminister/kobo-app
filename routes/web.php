<?php
use Koboaccountant\Models\Sales;

Route::get('/users', function(){
    return Sales::with('Customer')->get();
});
Route::get('/loans', function () {
    return view('loans');
});


use Illuminate\Http\Request;

Route::get('/started', 'PaymentController@index');

Route::post('webhook', function(Request $request){
    dd($request);
});


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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/payment/success', 'PaymentController@paid');

    Route::get('/dashboard','DashboardController@index');

    Route::get('/sales', 'SalesController@index');
    
    Route::get('/addSales', 'SalesController@sales');
    Route::get('/expenses', 'ExpensesController@index');
    Route::get('/assets', 'AssetController@openingAsset');
    Route::get('/debtors', 'DebtorController@index');
    Route::get('/creditors', 'CreditorController@index');
    Route::post('updateFirstTimeLogin', 'UserController@upDateFirstTimeVisit');
});



// Accountant rotes 
// Route::group(['middleware' => ''], function() {
    Route::get('/accountant/dashboard', 'AccountantController@index');
// });


