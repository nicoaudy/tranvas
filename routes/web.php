<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    $eventController = '\App\Modules\Event\Http\Controllers\EventsController';

    Route::get('user/profile', 'ProfileController@index')->name('profile');
    Route::post('user/profile', 'ProfileController@store')->name('profile-save');

    Route::get('events', "{$eventController}@index")->name('events');
    Route::get('events/add', "{$eventController}@add")->name('event.add');
    Route::post('events/save', "{$eventController}@store")->name('event.save');
    Route::get('events/view/{event}', "{$eventController}@view")->name('event.view');
});


Route::get('/home', 'HomeController@index')->name('home');
