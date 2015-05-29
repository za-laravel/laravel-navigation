<?php

namespace ZaLaravel\LaravelNavigation\Composers;

use Illuminate\Contracts\View\View;
use ZaLaravel\LaravelNavigation\Models\Navigation;

/**
 * Class NavigationComposer
 * @package ZaLaravel\LaravelNavigation\Composers
 */
class NavigationComposer
{
    public function compose(View $view)
    {
        $navItems = Navigation::all();

        $view->with('items', $navItems);

    }
}
