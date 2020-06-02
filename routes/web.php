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
        # Package editor
        Route::prefix('/filemanager')->name('unisharp.lfm.')->namespace('\UniSharp\LaravelFilemanager\Controllers')->group(function () {
            Route::get('/', 'LfmController@show')->name('show');
            Route::any('/upload', 'UploadController@upload')->name('upload');
            Route::get('/errors', 'LfmController@getErrors')->name('getErrors');
            Route::get('/jsonitems', 'ItemsController@getItems')->name('getItems');
            Route::get('/move', 'ItemsController@move')->name('move');
            Route::get('/domove', 'ItemsController@move')->name('domove');
            Route::get('/newfolder', 'FolderController@getAddfolder')->name('getAddfolder');
            Route::get('/folders', 'FolderController@getFolders')->name('getFolders');
            Route::get('/crop', 'CropController@getCrop')->name('getCrop');
            Route::get('/cropimage', 'CropController@getCropimage')->name('getCropimage');
            Route::get('/cropnewimage', 'CropController@getNewCropimage')->name('getCropimage');
            Route::get('/rename', 'RenameController@getRename')->name('getRename');
            Route::get('/resize', 'ResizeController@getResize')->name('getResize');
            Route::get('/doresize', 'ResizeController@performResize')->name('performResize');
            Route::get('/download', 'DownloadController@getDownload')->name('getDownload');
            Route::get('/delete', 'DeleteController@getDelete')->name('getDelete');
        });
        Route::get('/', 'ManagesController@index')->name('dashboard');
        Route::resource('categories', 'CategoriesController')->parameters([
            'categories' => 'id'
        ]);
        Route::post('products/attributes/delete/{id}', 'ProductsController@deleteAttribute')->name('products.attributes.delete')->where('id', '[0-9]+');
        Route::resource('products', 'ProductsController')->parameters([
            'products' => 'id'
        ]);
        Route::prefix('orders')->group(function () {
            Route::get('mail/{id}/confirm', 'OrdersController@sentMailConfirm')->name('orders.mail.confirm')->where('id', '[0-9]+');
            Route::get('{id}/invoice', 'OrdersController@invoice_index')->name('orders.invoice')->where('id', '[0-9]+');
            Route::get('{id}/invoice/pdf', 'OrdersController@exportOrderPdf')->name('orders.invoice.pdf')->where('id', '[0-9]+');
        });
        Route::resource('orders', 'OrdersController')->parameters([
            'orders' => 'id'
        ]);
        Route::prefix('posts')->group(function () {
            Route::resource('posts', 'PostsController')->parameters([
                'posts' => 'id'
            ]);
            Route::namespace('Posts')->group(function () {
                Route::resource('category', 'CategoryController')->parameters([
                    'category' => 'id'
                ]);
                Route::resource('tags', 'TagsController')->parameters([
                    'tags' => 'id'
                ]);
            });
        });
        Route::resource('medias', 'MediasController')->parameters([
            'medias' => 'id'
        ]);
        Route::resource('sliders', 'SlidersController')->parameters([
            'sliders' => 'id'
        ]);
        Route::resource('pages', 'PagesController')->parameters([
            'pages' => 'id'
        ]);
        Route::resource('comments', 'CommentsController')->parameters([
            'comments' => 'id'
        ]);
        Route::resource('customers', 'CustomersController')->parameters([
            'customers' => 'id'
        ]);
        Route::resource('admins', 'AdminsController')->parameters([
            'admins' => 'id'
        ]);
        Route::resource('roles', 'RolesController')->parameters([
            'roles' => 'id'
        ]);
        Route::resource('email', 'EmailController')->parameters([
            'email' => 'id'
        ]);
        Route::prefix('settings')->group(function () {
            Route::get('settings', 'SettingsController@index')->name('settings.index');
            Route::post('settings', 'SettingsController@update')->name('settings.update');
        });
    });
});

Route::get('/chuyen-muc/{slug}/', 'CategoriesController@show')->name('category.show');
Route::get('/san-pham/{slug}/', 'ProductsController@show')->name('product.show');
Route::get('/product/quick-view/', 'ProductsController@quick_view')->name('product.quick_view');
Route::get('/san-pham/', 'ProductsController@listProduct')->name('product.list');

Route::get('/tin-tuc/', 'PostsController@show')->name('posts.show');
Route::get('/tin-tuc/{slug}', 'PostsController@detail')->name('posts.detail');
Route::post('/binh-luan/', 'PostsController@comment')->name('posts.comment');

Route::namespace('Checkout')->group(function () {
    Route::get('/gio-hang/', 'CartController@index')->name('checkout.cart.index');
    Route::get('/thong-tin-giao-hang/', 'CheckoutController@index')->name('checkout.index');
    Route::post('/dat-hang/', 'CheckoutController@save')->name('checkout.save');
    Route::get('/dat-hang-thanh-cong/', 'CheckoutController@thanks')->name('checkout.thanks');
    Route::post('/state/', 'CheckoutController@getState')->name('checkout.state');
    Route::prefix('/checkout/')->group(function () {
        Route::get('/get-item-cart/', 'CartController@getListItem')->name('checkout.cart.listitem');
        Route::post('/addtocart/', 'CartController@add')->name('checkout.cart.add');
        Route::post('/removecart/', 'CartController@remove')->name('checkout.cart.remove');
        Route::post('/removeallcart/', 'CartController@removeAll')->name('checkout.cart.removeall');
        Route::post('/update/', 'CartController@update')->name('checkout.cart.update');
    });
});


Route::get('/so-sanh-san-pham/', 'ComparesController@index')->name('compare.index');
Route::group(['prefix' => '/compares/'], function () {
    Route::get('/add/', 'ComparesController@add')->name('compare.add');
    Route::get('/remove/', 'ComparesController@remove')->name('compare.remove');
});

Route::get('lien-he', 'ContactController@index')->name('contact.index');
Route::post('lien-he', 'ContactController@store')->name('contact.store');
Route::get('tim-kiem', 'SearchController@index')->name('search.index');
Route::get('page/{page_slug}', 'PagesController@index')->name('page.show');


