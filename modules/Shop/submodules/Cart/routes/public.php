<?php

// Shop
Route::get('cart', 'Cart\Controllers\CartController@index')->name('shop.cart');

// Cart
Route::delete('cart/clear', 'Cart\Controllers\CartController@clear')->name('cart.clear');
Route::delete('cart/{cart}/remove', 'Cart\Controllers\CartController@remove')->name('cart.remove');
Route::post('cart/add', 'Cart\Controllers\CartController@add')->name('cart.add');
Route::post('cart/{cart}/update', 'Cart\Controllers\CartController@update')->name('cart.update');
