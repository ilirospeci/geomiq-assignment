<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'created_at' => '2023-04-08 16:53:43',
        ]);

        DB::table('roles')->insert([
            'name' => 'vendor',
            'created_at' => '2023-04-20 14:59:21',
        ]);
    }
}
