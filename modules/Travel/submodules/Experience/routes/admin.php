<?php

// Billing
Route::get('experiences/{experience}/details', 'Experience\Controllers\BillingController@detail')->name('experiences.details');
Route::post('billing/add', 'Experience\Controllers\BillingController@add')->name('experiences.add');
Route::get('billing/{experience}/payment', 'Experience\Controllers\BillingController@payment')->name('experiences.payment');

// Normal
Route::resource('experiences', 'Experience\Controllers\ExperienceController')->except(['show']);
