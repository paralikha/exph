<?php

Route::delete('experiences/destroy/{experience}', 'Experience\API\Controllers\ExperienceController@destroy')->name('experiences.destroy');
Route::delete('experiences/delete/{experience}', 'Experience\API\Controllers\ExperienceController@delete')->name('experiences.delete');
Route::get('experiences/search', 'Experience\API\Controllers\ExperienceController@search')->name('experiences.search');
Route::get('experiences/trash/all', 'Experience\API\Controllers\ExperienceController@getTrash')->name('experiences.trash.all');
Route::post('experiences/{experience}/restore', 'Experience\API\Controllers\ExperienceController@restore')->name('experiences.restore');

Route::get('experiences/all', 'Experience\API\Controllers\ExperienceController@all')->name('experiences.all');
Route::get('experiences/hot', 'Experience\API\Controllers\ExperienceController@hot')->name('experiences.hot');

// Amenities
Route::delete('amenities/destroy/{amenity}', 'Experience\API\Controllers\AmenityController@destroy')->name('amenities.destroy');
Route::delete('amenities/delete/{amenity}', 'Experience\API\Controllers\AmenityController@delete')->name('amenities.delete');
Route::get('amenities/all', 'Experience\API\Controllers\AmenityController@all')->name('amenities.all');
Route::get('amenities/search', 'Experience\API\Controllers\AmenityController@search')->name('amenities.search');
Route::get('amenities/trash/all', 'Experience\API\Controllers\AmenityController@getTrash')->name('amenities.trash.all');
Route::post('amenities/grants', 'Experience\API\Controllers\AmenityController@grants')->name('amenities.grants');
Route::post('amenities/{amenity}/clone', 'Experience\API\Controllers\AmenityController@clone')->name('amenities.clone');
Route::post('amenities/{amenity}/restore', 'Experience\API\Controllers\AmenityController@restore')->name('amenities.restore');

// Categories
Route::delete('experiences/categories/destroy/{category}', 'Experience\API\Controllers\CategoryController@destroy')->name('experiences.categories.destroy');
Route::delete('experiences/categories/delete/{category}', 'Experience\API\Controllers\CategoryController@delete')->name('experiences.categories.delete');
Route::get('experiences/categories/all', 'Experience\API\Controllers\CategoryController@all')->name('experiences.categories.all');
Route::get('experiences/categories/search', 'Experience\API\Controllers\CategoryController@search')->name('experiences.categories.search');
Route::get('experiences/categories/trash/all', 'Experience\API\Controllers\CategoryController@getTrash')->name('experiences.categories.trash.all');
Route::post('experiences/categories/grants', 'Experience\API\Controllers\CategoryController@grants')->name('experiences.categories.grants');
Route::post('experiences/categories/{category}/clone', 'Experience\API\Controllers\CategoryController@clone')->name('experiences.categories.clone');
Route::post('experiences/categories/{category}/restore', 'Experience\API\Controllers\CategoryController@restore')->name('experiences.categories.restore');

