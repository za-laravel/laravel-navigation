<?php

namespace ZaLaravel\LaravelNavigation\Composers;

use Illuminate\Contracts\View\View;
use ZaLaravel\LaravelNavigation\Services\Navigation\NavigationService;

/**
 * Class NavigationComposer
 * @package ZaLaravel\LaravelNavigation\Composers
 */
class NavigationComposer
{
    public function compose(View $view)
    {
        $navItems = NavigationService::menuArray();

        $view->with('items', $navItems);

    }
}
