<?php

// Many
Route::delete('stories/delete/many', 'Story\Controllers\StoryManyController@delete')->name('stories.many.delete');
Route::delete('stories/destroy/many', 'Story\Controllers\StoryManyController@destroy')->name('stories.many.destroy');
Route::post('stories/restore/many', 'Story\Controllers\StoryManyController@restore')->name('stories.many.restore');

Route::delete('stories/delete/{story}', 'Story\Controllers\StoryController@delete')->name('stories.delete');
Route::get('stories/trash', 'Story\Controllers\StoryController@trash')->name('stories.trash');
Route::post('stories/refresh', 'Story\Controllers\StoryRefreshController@refresh')->name('stories.refresh.refresh');
Route::resource('stories', 'Story\Controllers\StoryController')->except(['show']);

//Comment
Route::post('stories/{experience}/comment', 'Story\Controllers\StoryController@comment')->name('stories.comment');
