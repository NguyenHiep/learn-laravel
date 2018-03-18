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
Route::get('/', 'HomeController@index')->name('home');
// Ajax frontend
//Route::post('sendmail', ['as' => 'sendmail', 'uses' => 'ContactController@index']);
Route::post('sendmail', ['as' => 'sendmail.create', 'uses' => 'Apis\ContactController@index']);

/*Route::get('login', 'LoginController@getlogin')->name('getlogin');
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@postlogin']);
Route::get('logout', 'LoginController@getlogout')->name('getlogout');*/
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
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductsController');

        Route::get('orders/{id}/invoice', ['as' => 'orders.invoice', 'uses' => 'OrdersController@invoice_index'])->where('id', '[0-9]+');
        Route::resource('orders', 'OrdersController');

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

        Route::resource('medias', 'MediasController');
        Route::resource('pages', 'PagesController');
        Route::resource('comments', 'CommentsController');
        Route::post('comments/batch', ['as' => 'comments.batch', 'uses' => 'CommentsController@batch']);
        Route::get('comments/batch', ['as' => 'comments.batch_get', 'uses' => 'CommentsController@batch']);
        Route::post('comments', ['as' => 'comments.search', 'uses' => 'CommentsController@index']);
        Route::resource('customers', 'CustomersController');
        Route::resource('email', 'EmailController');
        Route::resource('sliders', 'SlidersController');

        // Begin ajax
        Route::post('ajax/product','AjaxController@product');
        Route::get('ajax/product', 'AjaxController@product');

	});
});

Route::get('/chuyen-muc/{slug}/','CategoriesController@show')->name('category.show');
Route::get('/san-pham/{slug}/','ProductsController@show')->name('product.show');
Route::get('/product/quick-view/','ProductsController@quick_view')->name('product.quick_view');
Route::get('/san-pham-khuyen-mai/','ProductsController@promotion')->name('product.promotion');

Route::get('/tin-tuc/','PostsController@show')->name('posts.show');
Route::get('/tin-tuc/{slug}','PostsController@detail')->name('posts.detail');

Route::get('/gio-hang/','Checkout\CartController@index')->name('checkout.cart.index');
Route::get('/thong-tin-giao-hang/','Checkout\CheckoutController@index')->name('checkout.index');
Route::post('/order/save/','Checkout\CheckoutController@save')->name('checkout.save');

Route::get('/so-sanh-san-pham/','ComparesController@index')->name('compare.index');
Route::group(['prefix' => '/compares/'], function () {
    Route::get('/add/','ComparesController@add')->name('compare.add');
    Route::get('/remove/','ComparesController@remove')->name('compare.remove');
});
Route::group(['prefix' => '/checkout/'], function () {
    Route::post('/addtocart/','Checkout\CartController@add')->name('checkout.cart.add');
    Route::post('/removecart/','Checkout\CartController@remove')->name('checkout.cart.remove');
    Route::post('/removeallcart/','Checkout\CartController@removeAll')->name('checkout.cart.removeall');
    Route::post('/update/','Checkout\CartController@update')->name('checkout.cart.update');
});
Route::get('{page_slug}','PagesController@index')->name('page.show');


