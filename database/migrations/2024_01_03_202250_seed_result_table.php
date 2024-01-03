<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
            INSERT INTO result (id, name, role, email, company_name, registered_on, last_login)
            VALUES
            (4, 'Myrtis Klein', 'buyer', 'myrtis@yahoo.com', 'Wilderman-Heller', '2023-07-15 13:08:57', '2023-09-13 09:42:21'),
            (2, 'Candelario Rempel', 'vendor', 'c.rempel@hotmail.com', 'Mertz-Bradtke', '2023-04-20 14:59:21', '2023-09-12 16:20:55'),
            (3, 'Nelson Powlowski', 'buyer', 'nelson.pow@gmail.com', 'Kertzmann LLC', '2023-05-29 15:14:50', '2023-09-12 10:56:12'),
            (1, 'Viva Ratke', 'admin', 'viva.ratke@gmail.com', 'Hartmann-Wiegand', '2023-04-08 16:53:43', '2023-08-10 09:11:34')
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("
        DELETE FROM result
        WHERE id IN (4, 2, 3, 1)
    ");
    }
};
