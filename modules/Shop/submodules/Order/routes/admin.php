<?php

Route::post('orders/export', '\Order\Controllers\OrderController@export')->name('orders.export');

Route::resource('orders', '\Order\Controllers\OrderController');
