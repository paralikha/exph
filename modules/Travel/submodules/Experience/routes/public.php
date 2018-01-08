<?php

Route::get('experiences/{experience}', 'Experience\Controllers\ExperiencePublicController@show')->name('experiences.show');

Route::get('experiences', 'Experience\Controllers\ExperiencePublicController@all')->name('experiences.all');
Route::get('yolo', 'Experience\Controllers\ExperiencePublicController@yolo')->name('yolo');

Route::get('mailable', function () {
    $order = \Experience\Models\Order::find(1);

    return new \Experience\Mail\OrderReceived($order);
    //
    Illuminate\Support\Facades\Mail::to('john.dionisio1@gmail.com')->send(new \Experience\Mail\OrderReceived($order));
    return "done";
});
