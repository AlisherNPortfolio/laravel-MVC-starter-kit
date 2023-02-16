<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignRolesToUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administratorRole = Role::query()->where('name', 'administrator')->first();
        $prRole = Role::query()->where('name', 'pr')->first();
        $userRole = Role::query()->where('name', 'user')->first();

        $adminUser = User::query()->where('email', 'starterkit@mail.uz')->first();
        $prUser = User::query()->where('email', 'pr@mail.uz')->first();
        $justUser = User::query()->where('email', 'user@mail.uz')->first();

        if ($administratorRole && $adminUser) {
            $adminUser->assignRole($administratorRole);
        }

        if ($prRole && $prUser) {
            $prUser->assignRole($prRole);
        }

        if ($justUser && $userRole) {
            $justUser->assignRole($userRole);
        }
    }
}
