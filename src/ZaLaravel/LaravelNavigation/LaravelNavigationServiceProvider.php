<?php

namespace ZaLaravel\LaravelNavigation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

/**
 * Class LaravelNavigationServiceProvider
 * @package ZaLaravel\LaravelNavigation
 */
class LaravelNavigationServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-navigation');

        $this->publishes([
            __DIR__.'../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}