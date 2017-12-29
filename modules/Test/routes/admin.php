<?php

// Route::resource('tests', 'Test\Controllers\TestController');

// Route::group(['prefix' => 'courses'], function () {
    /**
     * Categories
     *
     */
    Route::delete('tests/delete/many', 'Test\Controllers\TestManyController@delete')->name('tests.many.delete');
    Route::delete('tests/delete/{test}', 'Test\Controllers\TestController@delete')->name('tests.delete');
    Route::delete('tests/destroy/many', 'Test\Controllers\TestManyController@destroy')->name('tests.many.destroy');
    Route::get('tests/refresh', 'Test\Controllers\TestRefreshController@index')->name('tests.refresh.index');
    Route::get('tests/trash', 'Test\Controllers\TestController@trash')->name('tests.trash');
    Route::post('tests/refresh', 'Test\Controllers\TestRefreshController@refresh')->name('tests.refresh.refresh');
    Route::post('tests/restore/many', 'Test\Controllers\TestManyController@restore')->name('tests.many.restore');
    Route::post('tests/{test}/restore', 'Test\Controllers\TestController@restore')->name('tests.restore');
    Route::resource('tests', 'Test\Controllers\TestController');
// });
