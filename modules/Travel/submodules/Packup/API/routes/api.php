<?php

Route::delete('packups/destroy/{packup}', 'Packup\API\Controllers\PackupController@destroy')->name('packups.destroy');
Route::delete('packups/delete/{packup}', 'Packup\API\Controllers\PackupController@delete')->name('packups.delete');
Route::get('packups/search', 'Packup\API\Controllers\PackupController@search')->name('packups.search');
Route::get('packups/trash/all', 'Packup\API\Controllers\PackupController@getTrash')->name('packups.trash.all');
Route::post('packups/{packup}/restore', 'Packup\API\Controllers\PackupController@restore')->name('packups.restore');

Route::get('packups/all', 'Packup\API\Controllers\PackupController@all')->name('packups.all');

// Budgets
Route::delete('packups/budgets/destroy/{budget}', 'Packup\API\Controllers\BudgetController@destroy')->name('packups.budgets.destroy');
Route::delete('packups/budgets/delete/{budget}', 'Packup\API\Controllers\BudgetController@delete')->name('packups.budgets.delete');
Route::get('packups/budgets/all', 'Packup\API\Controllers\BudgetController@all')->name('packups.budgets.all');
Route::get('packups/budgets/search', 'Packup\API\Controllers\BudgetController@search')->name('packups.budgets.search');
Route::get('packups/budgets/trash/all', 'Packup\API\Controllers\BudgetController@getTrash')->name('packups.budgets.trash.all');
Route::post('packups/budget/grants', 'Packup\API\Controllers\BudgetController@grants')->name('packups.budgets.grants');
Route::post('packups/budgets/{budget}/clone', 'Packup\API\Controllers\BudgetController@clone')->name('packups.budgets.clone');
Route::post('packups/budgets/{budget}/restore', 'Packup\API\Controllers\BudgetController@restore')->name('packups.budgets.restore');

