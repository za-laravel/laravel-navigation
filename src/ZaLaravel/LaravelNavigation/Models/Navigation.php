<?php

namespace ZaLaravel\LaravelNavigation\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Navigation
 * @package ZaLaravel\LaravelNavigation\Models
 */
class Navigation extends Model {

    protected $fillable = ['name', 'link', 'sort_order'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Navigation','parent_id');
    }

}
