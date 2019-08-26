<?php

Route::group(['prefix' => 'seo-positions', 'as' => 'seo_positions.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'SeoPositionController@index')->name('index');
    Route::get('create', 'SeoPositionController@create')->name('create');
    Route::post('', 'SeoPositionController@store')->name('store');
    Route::post('positions', 'SeoPositionController@positions')->name('positions');
    Route::get('{id}/edit', 'SeoPositionController@edit')->name('edit');
    Route::put('{id}', 'SeoPositionController@update')->name('update');
    Route::delete('{id}', 'SeoPositionController@destroy')->name('destroy');

});
