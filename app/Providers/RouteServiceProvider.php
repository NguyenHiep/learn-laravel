<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Request $request)
    {
        $this->mapWebRoutes($request);

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(Request $request)
    {
        $locale = $request->segment(1);
        $this->app->setLocale($locale);
        $skip_locales = $this->app->config->get('app.skip_locales');

        // If the locale is added to to skip_locales array continue without locale
        if (in_array($locale, $skip_locales)) {
            Route::group([
                'middleware' => 'web',
                'namespace'  => $this->namespace,
            ], function ($router) {
                require base_path('routes/web.php');
            });
        } else {
            Route::group([
                'middleware' => 'web',
                'namespace'  => $this->namespace,
                'prefix'     => $locale
            ], function ($router) {
                require base_path('routes/web.php');
            });
        }

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
