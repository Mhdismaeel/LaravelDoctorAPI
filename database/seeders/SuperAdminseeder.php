<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class SuperAdminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'Super4254admin@gmail.com',
            'password' => bcrypt('464359cdm'),
            'mobile'=>'0988227860',
            'work'=>'Adminstration',
            'is_agent'=>'0'
        ]);

        $role = Role::create(['name' => 'SuperAdmin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->givePermissionTo($permissions);
        $user->assignRole([$role->id]);
    }
}
