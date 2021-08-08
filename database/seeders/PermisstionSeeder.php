<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisstionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /***********************Dashboard user************************* */
        Permission::create(['name'=>'Full Control']);
        Permission::create(['name'=>'Can Create']);
        Permission::create(['name'=>'Can Update']);
        Permission::create(['name'=>'Can Delete']);
        Permission::create(['name'=>'Can View']);
        //******************* Annymos user********************************* */
        Permission::create(['name'=>'Can Create Order']);
        Permission::create(['name'=>'Can Update Order']);
        Permission::create(['name'=>'Can Delete Order']);
        Permission::create(['name'=>'Can View Order']);

    }
}
