<?php

Route::get('reviews/all', 'Review\API\Controllers\ReviewController@all')->name('reviews.all');
Route::get('reviews/search', 'Review\API\Controllers\ReviewController@search')->name('reviews.search');
Route::post('reviews/store', 'Review\API\Controllers\ReviewController@store')->name('reviews.store');

Route::delete('reviews/destroy/{review}', 'Review\API\Controllers\ReviewController@destroy')->name('reviews.destroy');
Route::delete('reviews/delete/{review}', 'Review\API\Controllers\ReviewController@delete')->name('reviews.delete');
Route::get('reviews/paginated', 'Review\API\Controllers\ReviewController@paginated')->name('reviews.paginated');
Route::get('reviews/trash/all', 'Review\API\Controllers\ReviewController@getTrash')->name('reviews.trash.all');
Route::post('reviews/{review}/clone', 'Review\API\Controllers\ReviewController@clone')->name('reviews.clone');
Route::post('reviews/{review}/restore', 'Review\API\Controllers\ReviewController@restore')->name('reviews.restore');





