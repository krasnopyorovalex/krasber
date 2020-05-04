<?php

Route::group(['prefix' => 'portfolios', 'as' => 'portfolios.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'PortfolioController@index')->name('index');
    Route::get('create', 'PortfolioController@create')->name('create');
    Route::post('', 'PortfolioController@store')->name('store');
    Route::get('{id}/edit', 'PortfolioController@edit')->name('edit');
    Route::put('{id}', 'PortfolioController@update')->name('update');
    Route::delete('{id}', 'PortfolioController@destroy')->name('destroy');

});