<?php

namespace PlatinaKostroma\ImageProcessor\Facades;

use Illuminate\Support\Facades\Facade;

class ImageProcessor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'image-processor';
    }
}
