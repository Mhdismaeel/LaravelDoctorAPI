<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DoctorTypeSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(DoctorTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermisstionSeeder::class);
        $this->call(SuperAdminseeder::class);
        $this->call(StatusSeeder::class);

    }
}
