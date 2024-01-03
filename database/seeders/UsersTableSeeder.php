<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Viva Ratke',
            'email' => 'viva.ratke@gmail.com',
            'created_at' => '2023-04-08 16:53:43',
            'last_login' => '2023-08-10 09:11:34',
        ]);

        DB::table('users')->insert([
            'name' => 'Candelario Rempel',
            'email' => 'c.rempel@hotmail.com',
            'created_at' => '2023-04-20 14:59:21',
            'last_login' => '2023-09-12 16:20:55',
        ]);

        DB::table('users')->insert([
            'name' => 'Nelson Powlowski',
            'email' => 'nelson.pow@gmail.com',
            'created_at' => '2023-05-29 15:14:50',
            'last_login' => '2023-09-12 10:56:12',
        ]);

        DB::table('users')->insert([
            'name' => 'Myrtis Klein',
            'email' => 'myrtis@yahoo.com',
            'created_at' => '2023-07-15 13:08:57',
            'last_login' => '2023-09-13 09:42:21',
        ]);
    }
}
