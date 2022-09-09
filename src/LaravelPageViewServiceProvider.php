<?php

namespace Iotronlab\LaravelPageView;

use Closure;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Iotronlab\LaravelPageView\Commands\LaravelPageViewCommand;

class LaravelPageViewServiceProvider extends PackageServiceProvider
{
    /**
     * @param Package $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-page-view')
            ->hasViews()
            ->hasMigration('create_page_view_table')
            ->hasCommand(LaravelPageViewCommand::class);
    }


}
