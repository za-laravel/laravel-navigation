<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('navigation', 'ZaLaravel\LaravelNavigation\Models\Navigation');
Route::resource('/admin/navigation', 'ZaLaravel\LaravelNavigation\Controllers\AdminNavigationController');