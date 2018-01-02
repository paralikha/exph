<?php

Route::get('book-a-surprise', 'Booking\Controllers\BookingPublicController@all')->name('bookings.all');
Route::get('bookings/{booking}', 'Booking\Controllers\BookingPublicController@show')->name('bookings.show');

