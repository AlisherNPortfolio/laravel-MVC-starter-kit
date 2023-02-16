<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AssignPermissionToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // roles
        $adminRole = Role::query()->where('name', 'administrator')->first();
        $prRole = Role::query()->where('name', 'pr')->first();
        $userRole = Role::query()->where('name', 'user')->first();

        // permissions
        $create = Permission::query()->where('name', 'create')->first();
        $update = Permission::query()->where('name', 'update')->first();
        $delete = Permission::query()->where('name', 'delete')->first();
        $read = Permission::query()->where('name', 'read')->first();

        // assignment to admin
        if ($adminRole) {
            $adminRole->givePermissionTo($create);
            $adminRole->givePermissionTo($update);
            $adminRole->givePermissionTo($delete);
            $adminRole->givePermissionTo($read);
        }

        // assignment to pr
        if ($prRole) {
            $prRole->givePermissionTo($create);
            $prRole->givePermissionTo($read);
        }

        // assignment to user
        if ($userRole) {
            $userRole->givePermissionTo($read);
        }
    }
}
