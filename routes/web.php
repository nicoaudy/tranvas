<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('events', 'Event\EventController@index')->name('events');
    Route::get('events/add', 'Event\EventController@add')->name('event.add');
    Route::post('events/save', 'Event\EventController@store')->name('event.save');
    Route::get('events/view/{event}', 'Event\EventController@view')->name('event.view');
});


Route::get('/home', 'HomeController@index')->name('home');
