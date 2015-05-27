<?php

namespace ZaLaravel\LaravelNavigation\Models;

use ZaLaravel\LaravelNavigation\Models\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Navigation
 * @package ZaLaravel\LaravelNavigation\Models
 */
class Navigation extends Model implements NavigationInterface
{

    protected $fillable = ['name', 'link', 'sort_order'];

    public function parent()
    {
        return $this->belongsTo('ZaLaravel\LaravelNavigation\Models\Navigation', 'parent_id');
    }

}
