<?php

Route::get('tests/all', 'Test\API\Controllers\TestController@all')->name('tests.all');
Route::get('tests/search', 'Test\API\Controllers\TestController@search')->name('tests.search');
Route::post('tests/store', 'Test\API\Controllers\TestController@store')->name('tests.store');

Route::delete('tests/destroy/{test}', 'Test\API\Controllers\TestController@destroy')->name('tests.destroy');
Route::delete('tests/delete/{test}', 'Test\API\Controllers\TestController@delete')->name('tests.delete');
Route::get('tests/paginated', 'Test\API\Controllers\TestController@paginated')->name('tests.paginated');
Route::get('tests/trash/all', 'Test\API\Controllers\TestController@getTrash')->name('tests.trash.all');
Route::post('tests/{test}/clone', 'Test\API\Controllers\TestController@clone')->name('tests.clone');
Route::post('tests/{test}/restore', 'Test\API\Controllers\TestController@restore')->name('tests.restore');





