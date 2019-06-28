<?php

Route::get('/', 'homepageController@homeRental');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rentals/all', 'RentalController@showRentals')->name('rental.show-all');
Route::get('/rentals/sponsored', 'RentalController@sponsoredRentals')->name('rental.sponsored');


Route::get('/rentals/new', 'RentalController@createRental')->name('rental.create')->middleware('auth');;
Route::post('/rentals', 'RentalController@storeRental')->name('rental.store')->middleware('auth');;
Route::get('/rental/edit/{id}', 'RentalController@editRental')->name('edit.rental')->middleware('auth');;
Route::patch('/rental/edit/{id}', 'RentalController@updateRental')->name('update.rental')->middleware('auth');;

Route::get('/inbox/{id}', 'MessagesController@printMessagesById')->name('printMess')->middleware('auth');
Route::delete('/inbox/{id}', 'MessagesController@destroyMess')->name('destroyMess')->middleware('auth');

Route::get('/payment/sponsor/{id}', 'PaymentsController@selectSponsor')->name('payment.sponsor')->middleware('auth');;

Route::post('/payment/process/{id}', 'PaymentsController@process')->name('payment.process')->middleware('auth');;



// Search
Route::get('/search', 'SearchController@searchIndex')->name('search.index');
Route::get('/search/action', 'SearchController@action')->name('search.action');
