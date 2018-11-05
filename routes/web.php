<?php




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


