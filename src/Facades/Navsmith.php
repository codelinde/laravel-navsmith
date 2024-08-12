<?php

namespace CodeLinde\Navsmith\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeLinde\Navsmith\Navsmith
 */
class Navsmith extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodeLinde\Navsmith\Navsmith::class;
    }
}
