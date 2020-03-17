<?php

namespace NMH\WSDelivery;

use Illuminate\Support\ServiceProvider;

/***
 * Class WSDeliveryServiceProvider
 * @package NMH\WSDelivery
 */
class WSDeliveryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ws_delivery.php' => config_path('ws_delivery.php')
        ], 'ws_delivery_config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('WSDelivery', WSDeliveryController::class);
        $this->app->singleton('WSDelivery', function () {
            return new WSDeliveryController();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/ws_delivery.php', 'ws_delivery'
        );
    }
}
