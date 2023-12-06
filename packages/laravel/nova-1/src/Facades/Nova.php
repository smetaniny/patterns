<?php

namespace Laravel\Nova\Facades;

use Illuminate\Support\Facades\Facade;

class Nova extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'nova';
    }
}
