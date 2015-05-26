<?php

namespace ZaLaravel\LaravelNavigation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

/**
 * Class LaravelMenuServiceProvider
 * @package ZaLaravel\LaravelNavigation
 */
class LaravelMenuServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-navigation');
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