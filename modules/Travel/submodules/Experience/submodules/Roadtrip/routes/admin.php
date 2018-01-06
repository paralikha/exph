<?php

//Review
Route::post('roadtrips/{roadtrip}/review', 'Roadtrip\Controllers\RoadtripController@review')->name('roadtrips.review');

// SoftDeletes
Route::delete('roadtrips/{roadtrip}/delete', '\Roadtrip\Controllers\RoadtripController@delete')->name('roadtrips.delete');
Route::get('roadtrips/trashed', '\Roadtrip\Controllers\RoadtripController@trashed')->name('roadtrips.trashed');

Route::patch('roadtrips/{roadtrip}/restore', '\Roadtrip\Controllers\RoadtripController@restore')->name('roadtrips.restore');

Route::resource('roadtrips', '\Roadtrip\Controllers\RoadtripController');
