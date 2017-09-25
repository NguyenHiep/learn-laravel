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
			Route::get('admins/create', ['as' => 'admins.create', 'uses' => 'Settings\AdminsController@create']);
			Route::post('admins/create', ['as' => 'admins.store', 'uses' => 'Settings\AdminsController@store']);
			Route::get('admins/edit/{id}', ['as' => 'admins.edit', 'uses' => 'Settings\AdminsController@edit'])->where('id', '[0-9]+');
			//Route::patch('admins/edit/{id}', ['as' => 'admins.update', 'uses' => 'Settings\AdminsController@update']);
			Route::match(['put', 'patch'], 'admins/edit/{id}', ['as' => 'admins.update', 'uses' => 'Settings\AdminsController@update'])->where('id', '[0-9]+');
			Route::delete('admins/delete/{id}', ['as' => 'admins.destroy', 'uses' => 'Settings\AdminsController@destroy'])->where('id', '[0-9]+');
		});

        Route::group(['prefix' => 'posts'], function () {
            Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
            Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
            Route::post('posts/create', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
            Route::get('posts/edit/{id}', ['as' => 'posts.edit', 'uses' => 'PostsController@edit'])->where('id', '[0-9]+');
            Route::match(['put', 'patch'], 'posts/edit/{id}', ['as' => 'posts.update', 'uses' => 'PostsController@update'])->where('id', '[0-9]+');
            Route::delete('posts/delete/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy'])->where('id', '[0-9]+');

            Route::resource('category','Posts\CategoryController');
            Route::resource('tags','Posts\TagsController');
        });

        Route::resource('medias','MediasController');
	});
});

//Route::resource('test','AdminsController');


