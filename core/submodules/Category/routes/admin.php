<?php

// Many
Route::delete('categories/delete/many', 'Category\Controllers\CategoryManyController@delete')->name('categories.many.delete');
Route::delete('categories/destroy/many', 'Category\Controllers\CategoryManyController@destroy')->name('categories.many.destroy');
Route::post('categories/restore/many', 'Category\Controllers\CategoryManyController@restore')->name('categories.many.restore');

//Additionals
Route::delete('categories/delete/{category}', 'Category\Controllers\CategoryController@delete')->name('categories.delete');
Route::get('experiences/categories/trash', 'Category\Controllers\CategoryController@trash')->name('categories.trash');
Route::post('categories/{category}/restore', 'Category\Controllers\CategoryController@restore')->name('categories.restore');


//API
Route::delete('categories/destroy/{category}', 'Category\API\Controllers\CategoryController@destroy')->name('categories.destroy');
Route::delete('categories/delete/{category}', 'Category\API\Controllers\CategoryController@delete')->name('categories.delete');

Route::resource('categories', 'Category\Controllers\CategoryController');
