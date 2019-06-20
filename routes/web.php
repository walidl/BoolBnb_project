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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rentals/all', 'RentalController@showRentals')->name('rental.show-all');
Route::get('/rentals/new', 'RentalController@createRental')->name('rental.create');
Route::post('/rentals', 'RentalController@storeRental')->name('rental.store');
Route::get('/payment/sponsor/{id}', 'PaymentsController@selectSponsor')->name('payment.sponsor');

Route::post('/payment/process/{id}', 'PaymentsController@process')->name('payment.process');
