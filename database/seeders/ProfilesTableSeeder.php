<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'company_name' => 'Hartmann-Wiegand',
            'created_at' => '2023-04-08 16:53:43',
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
            'company_name' => 'Mertz-Bradtke',
            'created_at' => '2023-04-20 14:59:21',
        ]);

        DB::table('profiles')->insert([
            'user_id' => 3,
            'company_name' => 'Kertzmann LLC',
            'created_at' => '2023-05-29 15:14:50',
        ]);

        DB::table('profiles')->insert([
            'user_id' => 4,
            'company_name' => 'Wilderman-Heller',
            'created_at' => '2023-07-15 13:08:57',
        ]);
    }
}
