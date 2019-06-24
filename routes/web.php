<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rentals/all', 'RentalController@showRentals')->name('rental.show-all');
Route::get('/rentals/sponsored', 'RentalController@sponsoredRentals')->name('rental.sponsored');

Route::get('/rentals/new', 'RentalController@createRental')->name('rental.create');
Route::post('/rentals', 'RentalController@storeRental')->name('rental.store');
Route::get('/inbox/{id}', 'MessagesController@printMessagesById')->name('printMess')->middleware('auth');
Route::get('/payment/sponsor/{id}', 'PaymentsController@selectSponsor')->name('payment.sponsor');

Route::post('/payment/process/{id}', 'PaymentsController@process')->name('payment.process');
