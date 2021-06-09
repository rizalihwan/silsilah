<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/', 'auth.login')->middleware('guest');
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::namespace('Api')->group(function () {
        // child endpoints
        Route::resource('child', 'ChildController');
        // grand child endpoints
        Route::resource('grandchild', 'GrandchildController');
    });
});
