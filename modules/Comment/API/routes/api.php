<?php

Route::get('comments/all', 'Comment\API\Controllers\CommentController@all')->name('comments.all');
Route::get('comments/search', 'Comment\API\Controllers\CommentController@search')->name('comments.search');
Route::post('comments/store', 'Comment\API\Controllers\CommentController@store')->name('comments.store');

Route::delete('comments/destroy/{comment}', 'Comment\API\Controllers\CommentController@destroy')->name('comments.destroy');
Route::delete('comments/delete/{comment}', 'Comment\API\Controllers\CommentController@delete')->name('comments.delete');
Route::get('comments/paginated', 'Comment\API\Controllers\CommentController@paginated')->name('comments.paginated');
Route::get('comments/trash/all', 'Comment\API\Controllers\CommentController@getTrash')->name('comments.trash.all');
Route::post('comments/{comment}/clone', 'Comment\API\Controllers\CommentController@clone')->name('comments.clone');
Route::post('comments/{comment}/restore', 'Comment\API\Controllers\CommentController@restore')->name('comments.restore');





