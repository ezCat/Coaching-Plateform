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

Route::group(['prefix' => 'club'], function(){
    Route::get('show', 'ClubController@show');
    Route::get('index', 'ClubController@index');
    Route::post('store', 'ClubController@store');
    Route::post('destroy', 'ClubController@destroy');
    Route::put('update', 'ClubController@update');
});

Route::group(['prefix' => 'category'], function(){
    Route::get('show', 'CategoryController@show');
    Route::get('index', 'CategoryController@index');
    Route::post('store', 'CategoryController@store');
    Route::post('destroy', 'CategoryController@destroy');
    Route::put('update', 'CategoryController@update');
});

Route::group(['prefix' => 'player'], function(){
    Route::get('show', 'PlayerController@show');
    Route::get('index', 'PlayerController@index');
    Route::post('store', 'PlayerController@store');
    Route::post('destroy', 'PlayerController@destroy');
    Route::put('update', 'PlayerController@update');
});

Route::group(['prefix' => 'team'], function(){
    Route::get('show', 'TeamController@show');
    Route::get('index', 'TeamController@index');
    Route::post('store', 'TeamController@store');
    Route::post('destroy', 'TeamController@destroy');
    Route::put('update', 'TeamController@update');
});

Route::group(['prefix' => 'reminder'], function(){
    Route::get('show', 'ReminderController@show');
    Route::get('index', 'ReminderController@index');
    Route::post('store', 'ReminderController@store');
    Route::post('destroy', 'ReminderController@destroy');
    Route::put('update', 'ReminderController@update');
});


