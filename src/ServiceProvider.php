<?php

namespace Sarfraznawaz2005\LaraFeed;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/Config/config.php' => config_path('larafeed.php'),], 'larafeed.config');
            $this->publishes([__DIR__ . '/Views/Assets' => public_path('vendor/larafeed')], 'larafeed.assets');
            $this->publishes([__DIR__ . '/Migrations' => database_path('migrations')], 'larafeed.migration');
        }

        $this->loadViewsFrom(__DIR__ . '/Views', 'larafeed');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        Route::group([
            'namespace' => 'Sarfraznawaz2005\LaraFeed\Http\Controllers',
            'prefix' => 'larafeed',
            'middleware' => 'web',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/config.php', 'larafeed');
    }
}
