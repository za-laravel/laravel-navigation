<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use ZaLaravel\LaravelNavigation\Models\Navigation;

class NavigationTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('navigations')->delete();
        Model::unguard();

        DB::table('navigations')->insert(
            array(
                array('link' => '/',
                    'parent_id' => null,
                    'sort_order' => 1,
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),

                array('link' => '/about',
                    'parent_id' => null,
                    'sort_order' => 2,
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),
            ));
    }

}