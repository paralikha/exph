<?php

Route::get('bookings/{booking}', 'Booking\Controllers\BookingPublicController@show')->name('bookings.show');

Route::get('bookings', 'Booking\Controllers\BookingPublicController@all')->name('bookings.all');
