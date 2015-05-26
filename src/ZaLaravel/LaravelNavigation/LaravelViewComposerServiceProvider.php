<?php

namespace ZaLaravel\LaravelNavigation;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelViewComposerServiceProvider
 * @package ZaLaravel\LaravelNavigation
 */
class LaravelViewComposerServiceProvider extends ServiceProvider{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['helpers.nav', /* and maybe '.footer'*/], 'ZaLaravel\LaravelNavigation\Composers\NavigationComposer');
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        //
    }

}