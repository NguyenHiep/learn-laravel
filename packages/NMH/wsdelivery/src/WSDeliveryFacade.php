<?php

namespace NMH\WSDelivery;

use Illuminate\Support\Facades\Facade;

/***
 * Class WSDeliveryFacade
 * @package NMH\WSDelivery
 */
class WSDeliveryFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'WSDelivery';
    }
}
