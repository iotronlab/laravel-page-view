<?php

namespace Iotronlab\LaravelPageView\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iotronlab\LaravelPageView\LaravelPageView
 */
class LaravelPageView extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Iotronlab\LaravelPageView\LaravelPageView::class;
    }
}
