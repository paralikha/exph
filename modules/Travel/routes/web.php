<?php

Route::get('profile/{profile}/account', '\Travel\Controllers\AccountController@getAccountForm')->name('profile.account');
Route::get('profile/{profile}/wishlists', '\Travel\Controllers\WishlistController@index')->name('profile.wishlists');
