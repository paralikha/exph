<?php

Route::group(['prefix' => 'shop'], function () {
    // Products

    // Cart
    Route::get('cart', 'Shop\Controllers\ShopController@cart')->name('shop.cart');
    Route::get('products', 'Shop\Controllers\ShopController@products')->name('shop.products');
    Route::get('payment', 'Shop\Controllers\ShopController@payment')->name('shop.payment');

    // Status
    // Route::get('success', 'Shop\Controllers\ShopController@success')->name('shop.success');

    // Payment::PayPal
    Route::post('payment/paypal', '\Shop\Support\Payment\PayPal\Controllers\PayPalController@paypal')->name('shop.payment.paypal');

    Route::post('payment/paypal/execute', '\Shop\Support\Payment\PayPal\Controllers\PayPalController@execute')->name('shop.payment.paypal.execute');
});
