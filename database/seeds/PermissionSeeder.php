<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'create'],
            ['name' => 'update'],
            ['name' => 'delete'],
            ['name' => 'read'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
