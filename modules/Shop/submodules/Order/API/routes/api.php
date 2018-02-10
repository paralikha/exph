<?php

Route::delete('orders/destroy/{order}', '\Order\API\Controllers\OrderController@destroy')->name('orders.destroy');
Route::delete('orders/delete/{order}', '\Order\API\Controllers\OrderController@delete')->name('orders.delete');
Route::get('orders/search', '\Order\API\Controllers\OrderController@search')->name('orders.search');
Route::get('orders/trash/all', '\Order\API\Controllers\OrderController@getTrash')->name('orders.trash.all');
Route::post('orders/{order}/restore', '\Order\API\Controllers\OrderController@restore')->name('orders.restore');

Route::get('orders/all', '\Order\API\Controllers\OrderController@all')->name('orders.all');
