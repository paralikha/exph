<?php

Route::get('settings/shop', '\Travel\Controllers\ShopSettingController@getShopForm')->name('settings.shop');

Route::get('profile/{profile}/account', '\Travel\Controllers\AccountController@getAccountForm')->name('profile.account');
Route::get('profile/{profile}/wishlists', '\Travel\Controllers\WishlistController@index')->name('profile.wishlists');

Route::post('wishlists/store', '\Travel\Controllers\WishlistController@store')->name('wishlists.store');

// Transactions
Route::post('transactions/{handlename}/export', '\Travel\Controllers\TransactionController@export')->name('transactions.export');
