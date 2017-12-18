<?php

Route::delete('stories/destroy/{story}', 'Story\API\Controllers\StoryController@destroy')->name('stories.destroy');
Route::delete('stories/delete/{story}', 'Story\API\Controllers\StoryController@delete')->name('stories.delete');
Route::get('stories/search', 'Story\API\Controllers\StoryController@search')->name('stories.search');
Route::get('stories/trash/all', 'Story\API\Controllers\StoryController@getTrash')->name('stories.trash.all');
Route::post('stories/{story}/restore', 'Story\API\Controllers\StoryController@restore')->name('stories.restore');

Route::get('stories/all', 'Story\API\Controllers\StoryController@all')->name('stories.all');
