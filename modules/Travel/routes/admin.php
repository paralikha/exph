<?php


// Shop
Route::get('settings/shop', '\Travel\Controllers\ShopSettingController@getShopForm')->name('settings.shop');

Route::post('wishlists/store', '\Travel\Controllers\WishlistController@store')->name('wishlists.store');

// Transactions
Route::post('transactions/{handlename}/export', '\Travel\Controllers\TransactionController@export')->name('transactions.export');

// Home
Route::get('settings/home', 'Travel\Controllers\HomeSettingController@getHomeForm')->name('settings.home');
