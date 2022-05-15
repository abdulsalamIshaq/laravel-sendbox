<?php

namespace AbdulsalamIshaq\Sendbox\Facades;

use Illuminate\Support\Facades\Facade;
use AbdulsalamIshaq\Sendbox\Sendbox as SendboxClient;
/**
 * @see \AbdulsalamIshaq\Sendbox\Sendbox
 */
class Sendbox extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SendboxClient::class;
    }
}
