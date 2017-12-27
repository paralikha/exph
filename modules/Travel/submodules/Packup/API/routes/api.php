<?php

Route::delete('packups/destroy/{packup}', 'Packup\API\Controllers\PackupController@destroy')->name('packups.destroy');
Route::delete('packups/delete/{packup}', 'Packup\API\Controllers\PackupController@delete')->name('packups.delete');
Route::get('packups/search', 'Packup\API\Controllers\PackupController@search')->name('packups.search');
Route::get('packups/trash/all', 'Packup\API\Controllers\PackupController@getTrash')->name('packups.trash.all');
Route::post('packups/{packup}/restore', 'Packup\API\Controllers\PackupController@restore')->name('packups.restore');

Route::get('packups/all', 'Packup\API\Controllers\PackupController@all')->name('packups.all');
