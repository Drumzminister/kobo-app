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

Route::get('/dashboard', function () {
    return view('dashboard');
});

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


Route::get('/header', function () {
    return view('layouts.app');
});




// Authentication  routes
Route::group(['middle' => ['guest']], function() {
    Route::post('/register', 'UserController@create');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/logout', 'UserController@logout');
    Route::get('/accountant', 'UserController@accountant');
    Auth::routes();
    
});


// Auth routes
Route::group(['middleware' => 'auth'], function () {

});


// Accountant rotes 
Route::group(['middleware' => 'accountant'], function() {

});


