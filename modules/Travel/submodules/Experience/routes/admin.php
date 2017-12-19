<?php

// Billing
Route::get('experiences/{experience}/details', 'Experience\Controllers\BillingController@detail')->name('experiences.details');
Route::post('billing/add', 'Experience\Controllers\BillingController@add')->name('experiences.add');
Route::get('billing/{experience}/{order}/payment', 'Experience\Controllers\BillingController@payment')->name('experiences.payment');

Route::get('experiences/payment/success', 'Experience\Controllers\BillingController@success')->name('payment.paypal.success');
Route::get('experiences/payment/failed', 'Experience\Controllers\BillingController@failed')->name('payment.paypal.failed');

// Extra
Route::delete('amenities/delete/many', 'Catalogue\Controllers\CatalogueManyController@delete')->name('amenities.many.delete');
Route::delete('amenities/destroy/many', 'Catalogue\Controllers\CatalogueManyController@destroy')->name('amenities.many.destroy');
Route::post('amenities/restore/many', 'Catalogue\Controllers\CatalogueManyController@restore')->name('amenities.many.restore');

// Rate
Route::post('experiences/{experience}/rate', 'Experience\API\Controllers\ExperienceController@rate')->name('experiences.rate');

// Normal
Route::resource('experiences', 'Experience\Controllers\ExperienceController')->except(['show']);

// Category
Route::resource('experiences/amenities', 'Experience\Controllers\AmenityController');
