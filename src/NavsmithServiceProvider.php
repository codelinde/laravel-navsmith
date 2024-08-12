<?php

namespace CodeLinde\Navsmith;

use CodeLinde\Navsmith\Commands\NavsmithCommand;
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_navsmith_table')
            ->hasCommand(NavsmithCommand::class);
    }
}
