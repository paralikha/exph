<?php

// Rate
Route::post('packups/{packup}/rate', 'Packup\API\Controllers\PackupController@rate')->name('packups.rate');

//Review
Route::post('packups/{packup}/review', 'Packup\Controllers\PackupController@review')->name('packups.review');

// Normal
Route::resource('packups', 'Packup\Controllers\PackupController')->except(['show']);

// Budget
Route::resource('packups/amenities', 'Packup\Controllers\AmenityController');


Route::get('packups/budgets', 'Packup\Controllers\BudgetController@index')->name('packups.budgets.index');
Route::post('packups/budgets', 'Packup\Controllers\BudgetController@store')->name('packups.budgets.store');
