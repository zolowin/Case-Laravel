<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'category_name' => 'Iphone',
            'category_alias' => 'iphone',
            'category_enable'=> 1,
        ],
            [
                'category_name' => 'SamSung',
                'category_alias' => 'samsung',
                'category_enable' => 1,
            ],
            [
                'category_name' => 'OPPO',
                'category_alias' => 'oppo',
                'category_enable' => 1,
            ],
            [
                'category_name' => 'Huawei',
                'category_alias' => 'huawei',
                'category_enable' => 1,
            ]
        ]);
    }
}
