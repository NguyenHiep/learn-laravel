<?php

namespace App\Providers;

use App\Repositories\SettingRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings   = app(SettingRepository::class)->getSettings();
        $categories = app(CategoryRepository::class)->getListCategoryMenu();
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
