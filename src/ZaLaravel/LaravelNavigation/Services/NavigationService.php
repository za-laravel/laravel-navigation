<?php

namespace ZaLaravel\LaravelNavigation\Services\Navigation;

use ZaLaravel\LaravelNavigation\Models\Navigation;

/**
 * Class NavigationService
 * @package ZaLaravel\LaravelNavigation\Services\Navigation
 */
class NavigationService
{
    public function __construct()
    {

    }

    /**
     * @param bool $asArray Represent menu items as arrays if true
     * @return array Returns all menu as array
     */
    public function menu($asArray = false){
        $navs = Navigation::whereNull('parent_id')->orderBy('sort_order', 'ASC')->get();
        $result = [];

        foreach ($navs as $nav) {
            if ($asArray) {
                $_nav = $nav->toArray();
                $_nav['name'] = $nav->name;
                $result[] = [
                    'item' => $_nav,
                    'children' => $this->getChildren($nav, $asArray)
                ];
            } else {
                $result[] = [
                    'item' => $nav,
                    'children' => $this->getChildren($nav, $asArray)
                ];
            }
        }

        return $result;
    }

    /**
     * @return array
     */
    public function menuArray() {
        return $this->menu(true);
    }

    /**
     * @param Navigation $nav
     * @param bool $asArray
     * @return array
     */
    protected function getChildren(Navigation $nav, $asArray = false) {
        $navs = Navigation::where('parent_id', '=', $nav->id)->orderBy('sort_order', 'ASC')->get();
        $result = [];

        foreach($navs as $n){
            if ($asArray) {
                $_n = $n->toArray();
                $_n['name'] = $n->name;
                $result[] = [
                    'item' => $_n,
                    'children' => $this->getChildren($n, $asArray)
                ];
            } else {
                $result[] = [
                    'item' => $n,
                    'children' => $this->getChildren($n, $asArray)
                ];
            }
        }

        return $result;
    }
}
