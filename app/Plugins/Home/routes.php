<?php
//Route::prefix('/dashboard')->namespace('Admin')->group(function () {
//    Route::get('/', 'DashboardController@index')->name('dashboard');
//});
Route::get('/', 'HomeController@home');
