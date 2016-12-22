<?php

Route::group(['prefix' => 'document'], function(){
    Route::get('show', 'DocumentController@show');
    Route::get('index', 'DocumentController@index');
    Route::post('store', 'DocumentController@store');
    Route::post('destroy', 'DocumentController@destroy');
    Route::put('update', 'DocumentController@update');
});


