<?php

Route::get('roadtrips', 'Roadtrip\Controllers\RoadtripPublicController@all')->name('roadtrips.all');
Route::get('roadtrips/{roadtrip}', 'Roadtrip\Controllers\RoadtripPublicController@show')->name('roadtrips.show');

Route::get('roadtrips', '\Roadtrip\Controllers\RoadtripController@all')->name('roadtrips.all');
