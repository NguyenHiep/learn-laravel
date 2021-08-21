<?php

namespace App\Utils;

use Illuminate\Contracts\Container\BindingResolutionException;

class Resource {

    public static function index() {
        try {
            $app = app()->make('stdClass');
            $app->Constants = self::getConstants();
            $app->Resources = self::getResources();
            $app->Urls = self::getUrls();
            $app->SitePreferences = self::getSitePreferences();
            return $app;
        } catch (BindingResolutionException $e) {
            logger('Resource errors: ', $e->getMessage());
            return [];
        }
    }

    private static function getUrls()
    {
        return [
            'MINI_CART'         => route('checkout.cart.listitem'),
            'ADD_TO_CART'       => route('checkout.cart.add'),
            'UPDATE_CART'       => route('checkout.cart.update'),
            'REMOVE_CART'       => route('checkout.cart.remove'),
            'REMOVE_ALL_CART'   => route('checkout.cart.removeall'),
            'REGISTER_USER'     => '/register',
            'REFRESH_RECAPTCHA' => route('refresh.captcha')
        ];
    }

    private static function getResources()
    {
        return [
            'REMOVE_ALL_ITEMS' => __('frontend.message.remove_all_items'),
            'SELECT_ITEM'      => __('frontend.message.select_item')
        ];
    }

    private static function getConstants()
    {
        return [];
    }

    private static function getSitePreferences()
    {
        return [];
    }
}
