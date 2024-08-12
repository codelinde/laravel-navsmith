<?php

it('renders the links component with the correct links', function () {
    expect($this->blade('<x-navsmith />'))->toMatchSnapshot();
});

it('renders the links component with passed through attributes', function () {
    $this->blade("<x-navsmith wire:navigate />")
        ->assertSeeInOrder([
                               "a", "wire:navigate", "Home", "/a", "a", "wire:navigate", "About", "/a", "a",
                               "wire:navigate", "Contact", "/a",
                           ]);

});

it('renders the merged class attribute according to the value set to the current attribute', function () {
    $request = \Illuminate\Http\Request::create('/');

    $this->app->instance('request', $request);

    expect($this->blade('<x-navsmith class="text-black" current="font-bold" />'))->toMatchSnapshot();
});

it('renders the merged style attribute according to the value set to the current attribute', function () {
    $request = \Illuminate\Http\Request::create('/');

    $this->app->instance('request', $request);

    expect($this->blade('<x-navsmith style="color: rgb(0 0 0);" current="font-weight: 700;" />'))->toMatchSnapshot();
});
