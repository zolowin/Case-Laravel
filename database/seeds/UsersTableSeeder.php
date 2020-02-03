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
            'name' => 'admin',
            'email' => 'tanhoangrvp@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 2,
            'money' => 100000000,
        ]);
    }
}
