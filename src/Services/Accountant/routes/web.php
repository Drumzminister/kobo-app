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

Route::group(['prefix' => 'accountant'], function() {

    Route::get('/register', 'AccountantRegistrationController@showNewAccountantForm')->name('register.accountant');
	Route::post('/register', 'AccountantRegistrationController@showNewAccountantForm')->name('register.accountant');

	// Accountant Dashboard Routes
	Route::get('/dashboard', 'AccountantDashboardController@showAccountantDashboardPage')->name('accountant.dashboard');

	// Client Review
    // Route::get('/clients', 'AccountantDashboardController@showClients')->name('accountant.clients');
    
    Route::get('/clients', 'ClientController@showClientPages')->name('client.index');    
    Route::post('/clients-review', 'AccountantDashboardController@reviewClient')->name('client.review');
    Route::get('/client/profile', 'ClientController@showClientProfilePage')->name('client.profile');    
    Route::get('/manage-clients', 'ClientController@ShowManageClientPage')->name('client.manage-client');    

    // Accountant Profile
    Route::post('/profile-update', 'AccountantDashboardController@updateProfile')->name('accountant.profile.update');
    Route::get('/profile-update', 'AccountantDashboardController@showProfile')->name('accountant.profile.update');

    // Accountant Budget Routes
    Route::get('/clients-budget/{id}', 'AccountantDashboardController@viewBudget')->name('view.budget');

    Route::get('/npv', 'NPVController@ShowNPVPages')->name('NPV.index');    

    Route::get('/resources', 'ResourceController@ShowResourcePages')->name('resource.index');    

    Route::get('/toolkits', 'ToolkitController@ShowToolkitPages')->name('toolkits.index');    


});
