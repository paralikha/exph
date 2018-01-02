<?php

// Rate
Route::post('bookings/{booking}/rate', 'Booking\API\Controllers\BookingController@rate')->name('bookings.rate');

//Review
Route::post('bookings/{booking}/review', 'Booking\Controllers\BookingController@review')->name('bookings.review');

// Normal
Route::resource('bookings', 'Booking\Controllers\BookingController')->except(['show']);

// Budget
Route::resource('bookings/amenities', 'Booking\Controllers\AmenityController');


Route::get('bookings/budgets', 'Booking\Controllers\BudgetController@index')->name('bookings.budgets.index');
Route::post('bookings/budgets', 'Booking\Controllers\BudgetController@store')->name('bookings.budgets.store');
