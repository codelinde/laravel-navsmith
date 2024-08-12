<?php

namespace CodeLinde\Navsmith;

use CodeLinde\Navsmith\Facades\Navsmith;
use CodeLinde\Navsmith\View\Components\Links;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NavsmithServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-navsmith')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        Route::macro(
            'navsmith',
            function (\Closure $callback) {
                /** @var RouteRegistrar $this */
                return $this->name(Navsmith::getNamePrefix())->group($callback);
            }
        );
    }

    public function packageBooted(): void
    {
        Blade::component(Links::class, 'navsmith');
    }
}
