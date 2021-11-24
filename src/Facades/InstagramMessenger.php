<?php

namespace diezeel\LaravelFbMessengerApi\Facades;

use Illuminate\Support\Facades\Facade;

class InstagramMessenger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'InstagramMessenger';
    }
}