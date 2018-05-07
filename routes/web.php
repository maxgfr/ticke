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

Route::get('/', function () {
    return view('welcome');
})->name('accueil');


// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

/* AUTHENTIFIER */
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user_profile');
Route::post('/user', 'UserController@update')->name('user_update');

Route::get('/restaurant', 'RestaurantController@index')->name('restaurant.index');
Route::post('/restaurant/store', 'RestaurantController@store')->name('restaurant.store');
Route::post('/restaurant/update', 'RestaurantController@update')->name('restaurant.update');
Route::delete('/restaurant/destroy', 'RestaurantController@destroy')->name('restaurant.destroy');

Route::get('/restaurant/{id}/tickets', 'BatchTicketController@index')->name('batch_restaurant');
Route::post('/upload_tickets', 'BatchTicketController@import')->name('upload_tickets');
Route::get('/restaurant/{id_restau}/tickets/{id_batch}', 'BatchTicketController@showBatch')->name('show_batch');
Route::delete('/restaurant/{id_restau}/tickets/{id_batch}', 'BatchTicketController@destroyBatch')->name('destroy_batch');
Route::delete('/restaurant/{id_restau}/tickets/{id_batch}/id/{id_ticket}', 'BatchTicketController@destroyTickets')->name('destroy_tickets');

Route::get('/paiement-stage', 'PaymentController@indexPaiement')->name('page_payment_stripe');
Route::post('/paiement-stage', 'PaymentController@payment')->name('payment_stripe');
