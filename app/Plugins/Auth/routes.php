<?php


use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(static function () {
    // Login
    Route::match(['get', 'post'], 'sign-in', 'Admin\SignController@login')->name('sign-in');
});
