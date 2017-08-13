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
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('login', 'LoginController@getlogin')->name('getlogin');
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@postlogin']);
Route::get('logout', 'LoginController@getlogout')->name('getlogout');
/*
Route::get('manage', function () {
    return view('manage.home.main');
})->name('manage')->middleware('auth');
*/
Route::group(['middleware', 'auth'], function () {
    Route::group(['prefix' => 'manage', 'namespace' => 'Manage'], function () {
        Route::get('/', function () {
            return view('manage.home.main');
        })->name('manage');
        Route::group(['prefix' => 'settings'], function () {
            Route::get('settings', ['as' => 'index', 'uses' => 'SettingsController@index']);
        });
    });

});


