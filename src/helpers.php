<?php

use CodeLinde\Navsmith\Facades\Navsmith;

if (! function_exists('navsmith_route')) {
    function navsmith_route(string $route): string
    {
        return route(Navsmith::getRouteName($route));
    }
}
