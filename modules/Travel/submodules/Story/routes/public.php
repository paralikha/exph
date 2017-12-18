<?php

Route::get('stories', 'Story\Controllers\StoryPublicController@all')->name('stories.all');
Route::get('stories/{story}', 'Story\Controllers\StoryPublicController@show')->name('stories.show');
