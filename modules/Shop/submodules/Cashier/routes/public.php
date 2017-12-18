<?php

Route::post('payment/paypal', 'Cashier\Controllers\PaymentController@paypal')->name('payment.paypal');
Route::post('payment', 'Cashier\Controllers\PaymentController@generic')->name('payment.generic');

Route::get('payment/status', 'Shop\Support\Payment\PayPal\Controllers\PayPalController@status')->name('payment.status');

Route::get('payment/paypal/success', 'Cashier\Controllers\PaymentController@success')->name('payment.paypal.success');

Route::get('payment/paypal/failed', 'Cashier\Controllers\PaymentController@failed')->name('payment.paypal.failed');
