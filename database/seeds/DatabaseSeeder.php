<?php

use Database\Seeders\AssignPermissionToRoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AssignPermissionToRoleSeeder::class);
        $this->call(AssignRolesToUsers::class);
        $this->call(StaticTranslations::class);
    }
}
