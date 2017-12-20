<?php

// Many
Route::delete('categories/delete/many', 'Category\Controllers\CategoryManyController@delete')->name('categories.many.delete');
Route::delete('categories/destroy/many', 'Category\Controllers\CategoryManyController@destroy')->name('categories.many.destroy');
Route::post('categories/restore/many', 'Category\Controllers\CategoryManyController@restore')->name('categories.many.restore');

Route::resource('categories', 'Category\Controllers\CategoryController');
