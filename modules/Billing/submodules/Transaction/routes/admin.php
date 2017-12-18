<?php

Route::delete('transactions/delete/many', 'Transaction\Controllers\TransactionManyController@delete')->name('transactions.many.delete');
Route::delete('transactions/delete/{transaction}', 'Transaction\Controllers\TransactionController@delete')->name('transactions.delete');
Route::delete('transactions/destroy/many', 'Transaction\Controllers\TransactionManyController@destroy')->name('transactions.many.destroy');
Route::get('transactions/refresh', 'Transaction\Controllers\TransactionRefreshController@index')->name('transactions.refresh.index');
Route::get('transactions/trash', 'Transaction\Controllers\TransactionController@trash')->name('transactions.trash');
Route::post('transactions/refresh', 'Transaction\Controllers\TransactionRefreshController@refresh')->name('transactions.refresh.refresh');
Route::post('transactions/restore/many', 'Transaction\Controllers\TransactionManyController@restore')->name('transactions.many.restore');
Route::post('transactions/{transaction}/restore', 'Transaction\Controllers\TransactionController@restore')->name('transactions.restore');
Route::resource('transactions', 'Transaction\Controllers\TransactionController');
