<?php

// Shop
Route::get('settings/shop', 'Travel\Controllers\ShopSettingController@getShopForm')->name('settings.shop');

// Home
Route::get('settings/home', 'Travel\Controllers\HomeSettingController@getHomeForm')->name('settings.home');
