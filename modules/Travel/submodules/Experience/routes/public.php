<?php

Route::get('experiences/{experience}', 'Experience\Controllers\ExperiencePublicController@show')->name('experiences.show');

Route::get('experiences', 'Experience\Controllers\ExperiencePublicController@all')->name('experiences.all');
Route::get('yolo', 'Experience\Controllers\ExperiencePublicController@yolo')->name('yolo');
