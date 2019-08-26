<?php

Route::group(['prefix' => 'seo_position_items', 'as' => 'seo_position_items.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('{seoPosition}', 'SeoPositionItemController@index')->name('index');
    Route::get('create/{seoPosition}', 'SeoPositionItemController@create')->name('create');
    Route::post('', 'SeoPositionItemController@store')->name('store');
    Route::get('{id}/edit', 'SeoPositionItemController@edit')->name('edit');
    Route::put('{id}', 'SeoPositionItemController@update')->name('update');
    Route::delete('{id}', 'SeoPositionItemController@destroy')->name('destroy');

});
