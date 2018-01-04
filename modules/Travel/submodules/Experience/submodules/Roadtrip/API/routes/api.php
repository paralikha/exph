<?php

Route::delete('roadtrips/destroy/{roadtrip}', 'Roadtrip\API\Controllers\RoadtripController@destroy')->name('roadtrips.destroy');
Route::delete('roadtrips/delete/{roadtrip}', 'Roadtrip\API\Controllers\RoadtripController@delete')->name('roadtrips.delete');
Route::get('roadtrips/search', 'Roadtrip\API\Controllers\RoadtripController@search')->name('roadtrips.search');
Route::get('roadtrips/trash/all', 'Roadtrip\API\Controllers\RoadtripController@getTrash')->name('roadtrips.trash.all');
Route::post('roadtrips/{roadtrip}/restore', 'Roadtrip\API\Controllers\RoadtripController@restore')->name('roadtrips.restore');

Route::get('roadtrips/all', 'Roadtrip\API\Controllers\RoadtripController@all')->name('roadtrips.all');

// Amenities
Route::delete('amenities/destroy/{amenity}', 'Roadtrip\API\Controllers\AmenityController@destroy')->name('amenities.destroy');
Route::delete('amenities/delete/{amenity}', 'Roadtrip\API\Controllers\AmenityController@delete')->name('amenities.delete');
Route::get('amenities/all', 'Roadtrip\API\Controllers\AmenityController@all')->name('amenities.all');
Route::get('amenities/search', 'Roadtrip\API\Controllers\AmenityController@search')->name('amenities.search');
Route::get('amenities/trash/all', 'Roadtrip\API\Controllers\AmenityController@getTrash')->name('amenities.trash.all');
Route::post('amenities/grants', 'Roadtrip\API\Controllers\AmenityController@grants')->name('amenities.grants');
Route::post('amenities/{amenity}/clone', 'Roadtrip\API\Controllers\AmenityController@clone')->name('amenities.clone');
Route::post('amenities/{amenity}/restore', 'Roadtrip\API\Controllers\AmenityController@restore')->name('amenities.restore');

// Categories
Route::delete('roadtrips/categories/destroy/{category}', 'Roadtrip\API\Controllers\CategoryController@destroy')->name('roadtrips.categories.destroy');
Route::delete('roadtrips/categories/delete/{category}', 'Roadtrip\API\Controllers\CategoryController@delete')->name('roadtrips.categories.delete');
Route::get('roadtrips/categories/all', 'Roadtrip\API\Controllers\CategoryController@all')->name('roadtrips.categories.all');
Route::get('roadtrips/categories/search', 'Roadtrip\API\Controllers\CategoryController@search')->name('roadtrips.categories.search');
Route::get('roadtrips/categories/trash/all', 'Roadtrip\API\Controllers\CategoryController@getTrash')->name('roadtrips.categories.trash.all');
Route::post('roadtrips/categories/grants', 'Roadtrip\API\Controllers\CategoryController@grants')->name('roadtrips.categories.grants');
Route::post('roadtrips/categories/{category}/clone', 'Roadtrip\API\Controllers\CategoryController@clone')->name('roadtrips.categories.clone');
Route::post('roadtrips/categories/{category}/restore', 'Roadtrip\API\Controllers\CategoryController@restore')->name('roadtrips.categories.restore');

