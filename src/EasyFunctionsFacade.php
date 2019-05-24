<?php

namespace Bagsiz\EasyFunctions;

use Illuminate\Support\Facades\Facade;
/**
 * @see \Bagsiz\EasyFunctions\EasyFunction
 */
class EasyFunctionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'easy-functions';
    }
}