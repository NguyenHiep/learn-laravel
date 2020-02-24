<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\Settings;
use App\Model\Categories;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings   = Settings::first();
        $categories = Categories::where('status', config('define.STATUS_ENABLE'))->get();
        View::share(['settings' => $settings, 'categories' => $categories]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
