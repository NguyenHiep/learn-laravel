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
Route::get('/', 'HomeController@index')->name('home');
Route::post('sendmail', ['as' => 'sendmail.create', 'uses' => 'Apis\ContactController@index']);
// Route in backend
Route::prefix('manage')->name('manage.')->namespace('Manage')->group(function () {
    Route::namespace('Auth')->group(function () {
        //Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');
        //Forgot Password Routes
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
    });

    // Backend route
    Route::middleware(['auth:user'])->group(function () {
        Route::get('/', 'ManagesController@index')->name('dashboard');
        Route::resource('categories', 'CategoriesController');
        Route::post('products/attributes/delete/{id}', 'ProductsController@deleteAttribute')->name('products.attributes.delete')->where('id', '[0-9]+');
        Route::resource('products', 'ProductsController');
        Route::prefix('orders')->group(function () {
            Route::get('mail/{id}/confirm', 'OrdersController@sentMailConfirm')->name('orders.mail.confirm')->where('id', '[0-9]+');
            Route::get('{id}/invoice', 'OrdersController@invoice_index')->name('orders.invoice')->where('id', '[0-9]+');
            Route::get('{id}/invoice/pdf', 'OrdersController@exportOrderPdf')->name('orders.invoice.pdf')->where('id', '[0-9]+');
        });
        Route::resource('orders', 'OrdersController');
        Route::prefix('posts')->group(function () {
            Route::resource('posts', 'PostsController');
            Route::namespace('Posts')->group(function () {
                Route::resource('category', 'CategoryController');
                Route::resource('tags', 'TagsController');
            });
        });
        Route::resource('medias', 'MediasController');
        Route::resource('sliders', 'SlidersController');
        Route::resource('pages', 'PagesController');
        Route::resource('comments', 'CommentsController');
        Route::resource('customers', 'CustomersController');
        Route::resource('admins', 'AdminsController');
        Route::resource('roles', 'RolesController');
        Route::resource('email', 'EmailController');
        Route::prefix('settings')->group(function () {
            Route::get('settings', 'SettingsController@index')->name('settings.index');
            Route::post('settings', 'SettingsController@update')->name('settings.update');
        });
    });
});

Route::get('/chuyen-muc/{slug}/', 'CategoriesController@show')->name('category.show');
Route::get('/san-pham/{slug}/', 'ProductsController@show')->name('product.show');
Route::get('/product/quick-view/', 'ProductsController@quick_view')->name('product.quick_view');
Route::get('/san-pham-khuyen-mai/', 'ProductsController@promotion')->name('product.promotion');

Route::get('/tin-tuc/', 'PostsController@show')->name('posts.show');
Route::get('/tin-tuc/{slug}', 'PostsController@detail')->name('posts.detail');
Route::post('/binh-luan/', 'PostsController@comment')->name('posts.comment');

Route::get('/gio-hang/', 'Checkout\CartController@index')->name('checkout.cart.index');
Route::get('/thong-tin-giao-hang/', 'Checkout\CheckoutController@index')->name('checkout.index');
Route::post('/dat-hang/', 'Checkout\CheckoutController@save')->name('checkout.save');
Route::get('/dat-hang-thanh-cong/', 'Checkout\CheckoutController@thanks')->name('checkout.thanks');

Route::get('/so-sanh-san-pham/', 'ComparesController@index')->name('compare.index');
Route::group(['prefix' => '/compares/'], function () {
    Route::get('/add/', 'ComparesController@add')->name('compare.add');
    Route::get('/remove/', 'ComparesController@remove')->name('compare.remove');
});
Route::group(['prefix' => '/checkout/'], function () {
    Route::post('/addtocart/', 'Checkout\CartController@add')->name('checkout.cart.add');
    Route::post('/removecart/', 'Checkout\CartController@remove')->name('checkout.cart.remove');
    Route::post('/removeallcart/', 'Checkout\CartController@removeAll')->name('checkout.cart.removeall');
    Route::post('/update/', 'Checkout\CartController@update')->name('checkout.cart.update');
});
Route::get('lien-he', 'ContactController@index')->name('contact.index');
Route::post('lien-he', 'ContactController@store')->name('contact.store');
Route::get('tim-kiem', 'SearchController@index')->name('search.index');
Route::get('{page_slug}', 'PagesController@index')->name('page.show');


