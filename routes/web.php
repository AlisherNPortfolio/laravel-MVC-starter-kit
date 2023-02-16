<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->namespace('Admin')->group(static function () {
    Route::middleware('guest')->group(static function () {
        // Login
        Route::match(['get', 'post'], 'sign-in', 'Auth\SignController@login')->name('sign-in');
        // Sign up
        //    Route::match(['get', 'post'], 'sign-up', [SignController::class, 'sign_up'])->name('sign-up');
    });
    Route::middleware('auth')->group(function () {
        Route::post('log-out', 'Auth\SignController@logout')->name('log-out');
    });

    Route::group(['middleware' => ['role:administrator|pr', 'auth']], static function () {
        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard');
        // Profile
        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::post('profile/update-main', 'ProfileController@updateMainData')->name('profile-update-main');
        Route::post('profile/update-additional', 'ProfileController@update')->name('profile-update-additional');
        // User
        Route::resource('users', 'UserController');
        // Roles
        Route::resource('role', 'RoleController');
        // Permissions
        Route::resource('permissions', 'PermissionController');
        // Static Translations
        Route::resource('static-translations', 'StaticTranslationController');
        // Static Translations Search DropDown
        Route::get('search-dropdown/static-translations', 'SearchDropdownController@staticTranslation');
        // Blog
        Route::resource('blog-category', 'BlogCategoryController');
        Route::resource('blog', 'BlogController');
    });



    //    Route::middleware('auth')->group(static function () {
    //        // Logout
    //
    //    });
    // Tests
    // Route::get('test', 'TestController@test');
    // Route::get('drag-drop', 'TestController@drag_drop');
    // Documentation
    Route::get('/doc/{viewName}', 'DocumentationController@index');
    // File Manager
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], static function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
