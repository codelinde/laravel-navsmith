<?php

test('navsmith_route returns the expected route', function () {
    expect(navsmith_route('home'))->toBe('http://localhost');
});
