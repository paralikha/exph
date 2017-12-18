<?php

Route::get('products/trash', 'Product\Controllers\ProductController@trash')->name('products.trash');

Route::resource('products', 'Product\Controllers\ProductController');
