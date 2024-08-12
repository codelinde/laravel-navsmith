<?php

use CodeLinde\Navsmith\View\Components\Links;

test('isCurrentLink correctly determines whether the link is the currently-visited', function () {
    $linksComponent = new Links();

    $request = \Illuminate\Http\Request::create('/about');

    $this->app->instance('request', $request);

    expect($linksComponent->isCurrentLink('http://localhost/about'))->toBeTrue();
});

test('getLinks correctly fetches all Navsmith-defined routes in the expected array format', function () {
    $linksComponent = new Links();

    expect($linksComponent->getLinks()->all())->toBe([
        'Home' => 'http://localhost',
        'About' => 'http://localhost/about',
        'Contact' => 'http://localhost/contact',
    ]);
});
