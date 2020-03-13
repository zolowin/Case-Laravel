<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [
               'name' => 'admin',
               'email' => 'tanhoangrvp@gmail.com',
               'password' => bcrypt('admin'),
               'level' => 2,
               'money' => 100000000,
           ],
            [
                'name' => 'Customer1',
                'email' => 'c9hai23@gmail.com',
                'password' => bcrypt('matkhau'),
                'level' => 1,
                'money' => 50000,
            ],
            [
                'name' => 'Customer2',
                'email' => 'cus1@gmail.com',
                'password' => bcrypt('matkhau'),
                'level' => 1,
                'money' => 4000,
            ],
            [
                'name' => 'Customer3',
                'email' => 'c9hai25@gmail.com',
                'password' => bcrypt('matkhau'),
                'level' => 1,
                'money' => 4000,
            ]
        ]);
    }
}
