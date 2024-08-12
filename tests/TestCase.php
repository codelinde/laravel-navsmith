<?php

namespace CodeLinde\Navsmith\Tests;

use CodeLinde\Navsmith\NavsmithServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            NavsmithServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }

    protected function defineRoutes($router)
    {
        Route::navsmith(function () {
            Route::get('/', fn () => 'home route')->name('home');
            Route::get('/about', fn () => 'about route')->name('about');
            Route::get('/contact', fn () => 'contact route')->name('contact');
        });
    }
}
