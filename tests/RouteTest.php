<?php

test('the navsmith macro renders the correct routes', function () {
    $this->get(route('navsmith.home'))
        ->assertStatus(200)
        ->assertContent('home route');

    $this->get(route('navsmith.about'))
        ->assertStatus(200)
        ->assertContent('about route');

    $this->get(route('navsmith.contact'))
        ->assertStatus(200)
        ->assertContent('contact route');
});
