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

//Addidtionals
Route::delete('experiences/delete/{experience}', 'Experience\Controllers\ExperienceController@delete')->name('experiences.delete');
Route::get('experiences/trash', 'Experience\Controllers\ExperienceController@trash')->name('experiences.trash');
Route::post('experiences/{experience}/restore', 'Experience\Controllers\ExperienceController@restore')->name('experiences.restore');

// Many
Route::delete('experiences/delete/many', 'Experience\Controllers\ExperienceManyController@delete')->name('experiences.many.delete');
Route::delete('experiences/destroy/many', 'Experience\Controllers\ExperienceManyController@destroy')->name('experiences.many.destroy');
Route::post('experiences/restore/many', 'Experience\Controllers\ExperienceManyController@restore')->name('experiences.many.restore');

// Rate
Route::post('experiences/{experience}/rate', 'Experience\API\Controllers\ExperienceController@rate')->name('experiences.rate');

//Review
Route::post('experiences/{experience}/review', 'Experience\Controllers\ExperienceController@review')->name('experiences.review');

// Normal
Route::resource('experiences', 'Experience\Controllers\ExperienceController')->except(['show']);

// Category
Route::resource('experiences/amenities', 'Experience\Controllers\AmenityController');


Route::get('experiences/categories', 'Experience\Controllers\CategoryController@index')->name('experiences.categories.index');
Route::post('experiences/categories', 'Experience\Controllers\CategoryController@store')->name('experiences.categories.store');
