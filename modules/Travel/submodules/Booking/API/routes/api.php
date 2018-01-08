<?php

Route::delete('bookings/destroy/{booking}', 'Booking\API\Controllers\BookingController@destroy')->name('bookings.destroy');
Route::delete('bookings/delete/{booking}', 'Booking\API\Controllers\BookingController@delete')->name('bookings.delete');
Route::get('bookings/search', 'Booking\API\Controllers\BookingController@search')->name('bookings.search');
Route::get('bookings/trash/all', 'Booking\API\Controllers\BookingController@getTrash')->name('bookings.trash.all');
Route::post('bookings/{booking}/restore', 'Booking\API\Controllers\BookingController@restore')->name('bookings.restore');

Route::get('bookings/all', 'Booking\API\Controllers\BookingController@all')->name('bookings.all');

// Budgets
Route::delete('bookings/budgets/destroy/{budget}', 'Booking\API\Controllers\BudgetController@destroy')->name('bookings.budgets.destroy');
Route::delete('bookings/budgets/delete/{budget}', 'Booking\API\Controllers\BudgetController@delete')->name('bookings.budgets.delete');
Route::get('bookings/budgets/all', 'Booking\API\Controllers\BudgetController@all')->name('bookings.budgets.all');
Route::get('bookings/budgets/search', 'Booking\API\Controllers\BudgetController@search')->name('bookings.budgets.search');
Route::get('bookings/budgets/trash/all', 'Booking\API\Controllers\BudgetController@getTrash')->name('bookings.budgets.trash.all');
Route::post('bookings/budget/grants', 'Booking\API\Controllers\BudgetController@grants')->name('bookings.budgets.grants');
Route::post('bookings/budgets/{budget}/clone', 'Booking\API\Controllers\BudgetController@clone')->name('bookings.budgets.clone');
Route::post('bookings/budgets/{budget}/restore', 'Booking\API\Controllers\BudgetController@restore')->name('bookings.budgets.restore');

