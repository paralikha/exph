<?php

// Billing
Route::get('experiences/{experience}/details', 'Experience\Controllers\BillingController@detail')->name('experiences.details');
Route::post('billing/add', 'Experience\Controllers\BillingController@add')->name('experiences.add');
Route::get('billing/{experience}/payment', 'Experience\Controllers\BillingController@payment')->name('experiences.payment');

// Extra
Route::delete('amenities/delete/many', 'Catalogue\Controllers\CatalogueManyController@delete')->name('amenities.many.delete');
Route::delete('amenities/destroy/many', 'Catalogue\Controllers\CatalogueManyController@destroy')->name('amenities.many.destroy');
Route::post('amenities/restore/many', 'Catalogue\Controllers\CatalogueManyController@restore')->name('amenities.many.restore');

// Normal
Route::resource('experiences', 'Experience\Controllers\ExperienceController')->except(['show']);

// Category
Route::resource('experiences/amenities', 'Experience\Controllers\AmenityController');
