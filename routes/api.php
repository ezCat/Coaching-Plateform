<?php

Route::group(['prefix' => 'document'], function(){
    Route::get('show', 'DocumentController@show');
    Route::get('index', 'DocumentController@index');
    Route::post('store', 'DocumentController@store');
    Route::post('destroy', 'DocumentController@destroy');
    Route::put('update', 'DocumentController@update');
});

Route::group(['prefix' => 'gym'], function(){
    Route::get('show', 'GymController@show');
    Route::get('index', 'GymController@index');
    Route::post('store', 'GymController@store');
    Route::post('destroy', 'GymController@destroy');
    Route::put('update', 'GymController@update');
});


