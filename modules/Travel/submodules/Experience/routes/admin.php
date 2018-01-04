<?php

// Billing
Route::get('experiences/{experience}/details', 'Experience\Controllers\BillingController@detail')->name('experiences.details');
Route::post('billing/add', 'Experience\Controllers\BillingController@add')->name('experiences.add');
Route::get('billing/{experience}/payment', 'Experience\Controllers\BillingController@payment')->name('experiences.payment');

Route::get('experiences/payment/success', 'Experience\Controllers\BillingController@success')->name('payment.paypal.success');
Route::get('experiences/payment/failed', 'Experience\Controllers\BillingController@failed')->name('payment.paypal.failed');

// Extra
Route::delete('amenities/delete/many', 'Catalogue\Controllers\CatalogueManyController@delete')->name('amenities.many.delete');
Route::delete('amenities/destroy/many', 'Catalogue\Controllers\CatalogueManyController@destroy')->name('amenities.many.destroy');
Route::post('amenities/restore/many', 'Catalogue\Controllers\CatalogueManyController@restore')->name('amenities.many.restore');

// Rate
Route::post('experiences/{experience}/rate', 'Experience\API\Controllers\ExperienceController@rate')->name('experiences.rate');

//Review
Route::post('experiences/{experience}/review', 'Experience\Controllers\ExperienceController@review')->name('experiences.review');

// SoftDeletes
Route::delete('experiences/{experience}/delete', '\Experience\Controllers\ExperienceController@delete')->name('experiences.delete');
Route::get('experiences/trashed', '\Experience\Controllers\ExperienceController@trashed')->name('experiences.trashed');

Route::patch('experiences/{experience}/restore', '\Experience\Controllers\ExperienceController@restore')->name('experiences.restore');

// Normal
Route::resource('experiences', '\Experience\Controllers\ExperienceController')->except(['show']);

// Amenities
Route::resource('experiences/amenities', 'Experience\Controllers\AmenityController');

// Category
Route::get('experiences/categories', 'Experience\Controllers\CategoryController@index')->name('experiences.categories.index');
Route::post('experiences/categories', 'Experience\Controllers\CategoryController@store')->name('experiences.categories.store');
