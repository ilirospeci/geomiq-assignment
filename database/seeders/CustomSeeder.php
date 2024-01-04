<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);

        DB::statement("
            INSERT INTO result (id, name, role, email, company_name, registered_on, last_login)
            SELECT
                u.id,
                u.name,
                COALESCE(r.name, 'default_role') AS role,
                u.email,
                p.company_name,
                p.created_at AS registered_on,
                u.last_login
            FROM
                users u
                LEFT JOIN model_has_roles mhr ON u.id = mhr.model_id AND mhr.model_type = 'App\\\\Models\\\\User'
                LEFT JOIN roles r ON mhr.role_id = r.id
                LEFT JOIN profiles p ON u.id = p.user_id
            ORDER BY u.id DESC
        ");
    }
}
