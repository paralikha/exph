<?php

Route::get('roadtrips/{roadtrip}', 'Roadtrip\Controllers\RoadtripPublicController@show')->name('roadtrips.show');

Route::get('roadtrips', '\Roadtrip\Controllers\RoadtripController@all')->name('roadtrips.all');
