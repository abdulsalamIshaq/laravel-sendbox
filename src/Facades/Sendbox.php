<?php

namespace AbdulsalamIshaq\Sendbox\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AbdulsalamIshaq\Sendbox\Sendbox
 */
class Sendbox extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-sendbox';
    }
}
