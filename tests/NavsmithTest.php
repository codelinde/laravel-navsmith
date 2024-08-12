<?php

use CodeLinde\Navsmith\Navsmith;

test('applyRouteNameTransformationCallback transforms the input to title case', function () {
    $navsmith = new Navsmith();
    expect($navsmith->applyRouteNameTransformation('home'))->toBe('Home');
});

test('getRouteName returns the route name including the prefix', function () {
    $navsmith = new Navsmith();
    expect($navsmith->getRouteName('home'))->toBe('navsmith.home');
});
