<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('login', 'LoginController@getlogin')->name('getlogin');
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@postlogin']);
Route::get('logout', 'LoginController@getlogout')->name('getlogout');
Route::group(['middleware', 'auth'], function () {
    Route::group(['prefix' => 'manage', 'namespace' => 'Manage'], function () {
        Route::get('/', ['as' => 'manage', 'uses' => 'ManagesController@index', function () { }]);
        Route::group(['prefix' => 'settings'], function () {
            Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
            Route::post('settings', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
            Route::get('admins', ['as' => 'admins.index', 'uses' => 'Settings\AdminsController@index']);
        });
    });

});


