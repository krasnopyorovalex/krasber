<?php

Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'FaqController@index')->name('index');
    Route::get('create', 'FaqController@create')->name('create');
    Route::post('', 'FaqController@store')->name('store');
    Route::get('{id}/edit', 'FaqController@edit')->name('edit');
    Route::put('{id}', 'FaqController@update')->name('update');
    Route::delete('{id}', 'FaqController@destroy')->name('destroy');

});