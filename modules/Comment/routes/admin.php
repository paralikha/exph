<?php

Route::delete('comments/delete/many', 'Comment\Controllers\CommentManyController@delete')->name('comments.many.delete');
Route::delete('comments/delete/{comment}', 'Comment\Controllers\CommentController@delete')->name('comments.delete');
Route::delete('comments/destroy/many', 'Comment\Controllers\CommentManyController@destroy')->name('comments.many.destroy');
Route::get('comments/refresh', 'Comment\Controllers\CommentRefreshController@index')->name('comments.refresh.index');
Route::get('comments/trash', 'Comment\Controllers\CommentController@trash')->name('comments.trash');
Route::post('comments/refresh', 'Comment\Controllers\CommentRefreshController@refresh')->name('comments.refresh.refresh');
Route::post('comments/restore/many', 'Comment\Controllers\CommentManyController@restore')->name('comments.many.restore');
Route::post('comments/{comment}/restore', 'Comment\Controllers\CommentController@restore')->name('comments.restore');
Route::resource('comments', 'Comment\Controllers\CommentController');
