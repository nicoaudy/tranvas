<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('events', 'Event\EventController@index')->name('events');
