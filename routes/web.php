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

Route::get('/','PagesController@index');


Route::get('login', 'LoginController@getlogin')->name('getlogin');
Route::post('login', 'LoginController@postlogin')->name('postlogin');
Route::get('logout', 'LoginController@getlogout')->name('getlogout');
Route::get('admincp', function (){
 	return  view('admin.home.main');
})->name('admincp')->middleware('auth');;
