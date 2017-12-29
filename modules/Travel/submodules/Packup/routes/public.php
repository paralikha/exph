<?php

Route::get('packups/{packup}', 'Packup\Controllers\PackupPublicController@show')->name('packups.show');

Route::get('packups', 'Packup\Controllers\PackupPublicController@all')->name('packups.all');
