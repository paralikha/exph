<?php

// Route::resource('reviews', 'Review\Controllers\ReviewController');

// Route::group(['prefix' => 'courses'], function () {
    /**
     * Categories
     *
     */
    Route::delete('reviews/delete/many', 'Review\Controllers\ReviewManyController@delete')->name('reviews.many.delete');
    Route::delete('reviews/delete/{review}', 'Review\Controllers\ReviewController@delete')->name('reviews.delete');
    Route::delete('reviews/destroy/many', 'Review\Controllers\ReviewManyController@destroy')->name('reviews.many.destroy');
    Route::get('reviews/refresh', 'Review\Controllers\ReviewRefreshController@index')->name('reviews.refresh.index');
    Route::get('reviews/trash', 'Review\Controllers\ReviewController@trash')->name('reviews.trash');
    Route::post('reviews/refresh', 'Review\Controllers\ReviewRefreshController@refresh')->name('reviews.refresh.refresh');
    Route::post('reviews/restore/many', 'Review\Controllers\ReviewManyController@restore')->name('reviews.many.restore');
    Route::post('reviews/{review}/restore', 'Review\Controllers\ReviewController@restore')->name('reviews.restore');
    Route::resource('reviews', 'Review\Controllers\ReviewController');
// });
