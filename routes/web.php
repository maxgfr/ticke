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

Route::get('/entity', 'EntityController@index')->name('entity.index');
Route::post('/entity/store', 'EntityController@store')->name('entity.store');
Route::post('/entity/update', 'EntityController@update')->name('entity.update');
Route::delete('/entity/destroy', 'EntityController@destroy')->name('entity.destroy');

Route::get('/pattern', 'PatternController@index')->name('pattern.index');
Route::post('/pattern/store', 'PatternController@store')->name('pattern.store');
Route::post('/pattern/update', 'PatternController@update')->name('pattern.update');
Route::delete('/pattern/destroy', 'PatternController@destroy')->name('pattern.destroy');

Route::get('/pattern/{id_pattern}/repartition', 'RepartitionController@index')->name('repartition.index');
Route::post('/repartition/store', 'RepartitionController@store')->name('repartition.store');
Route::post('/repartition/update', 'RepartitionController@update')->name('repartition.update');
Route::delete('/repartition/destroy', 'RepartitionController@destroy')->name('repartition.destroy');

Route::get('/entity/{id}/batchs', 'BatchController@index')->name('batch.index');
Route::post('/upload_tickets', 'BatchController@import')->name('upload_tickets');
Route::get('/entity/{id_restau}/batchs/{id_batch}', 'BatchController@showBatch')->name('batch.show');
Route::delete('/entity/{id_restau}/batchs/{id_batch}', 'BatchController@destroyBatch')->name('destroy_batch');
Route::delete('/entity/{id_restau}/batchs/{id_batch}/id/{id_ticket}', 'BatchController@destroyTickets')->name('destroy_tickets');

Route::get('/paiement-stage', 'PaymentController@indexPaiement')->name('page_payment_stripe');
Route::post('/paiement-stage', 'PaymentController@payment')->name('payment_stripe');
