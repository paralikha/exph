<?php

Route::get('transactions/all', '\Travel\API\Controllers\TransactionController@all')->name('transactions.all');
Route::get('transactions/search', '\Travel\API\Controllers\TransactionController@search')->name('transactions.search');
Route::post('transactions/store', '\Travel\API\Controllers\TransactionController@store')->name('transactions.store');

Route::delete('transactions/destroy/{transaction}', '\Travel\API\Controllers\TransactionController@destroy')->name('transactions.destroy');
Route::delete('transactions/delete/{transaction}', '\Travel\API\Controllers\TransactionController@delete')->name('transactions.delete');
Route::get('transactions/paginated', '\Travel\API\Controllers\TransactionController@paginated')->name('transactions.paginated');
Route::get('transactions/trash/all', '\Travel\API\Controllers\TransactionController@getTrash')->name('transactions.trash.all');
Route::post('transactions/{transaction}/clone', '\Travel\API\Controllers\TransactionController@clone')->name('transactions.clone');
Route::post('transactions/{transaction}/restore', '\Travel\API\Controllers\TransactionController@restore')->name('transactions.restore');





