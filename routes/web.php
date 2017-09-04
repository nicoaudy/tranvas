<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('events', 'Event\EventController@index')->name('events');
Route::get('events/view/{event}', 'Event\EventController@view')->name('event.view');
