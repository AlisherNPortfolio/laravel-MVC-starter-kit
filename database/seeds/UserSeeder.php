<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Alisher',
                'email' => 'starterkit@mail.uz',
                'password' => Hash::make('admin123')
            ],
            [
                'name' => 'PR user',
                'email' => 'pr@mail.uz',
                'password' => Hash::make('pr123')
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.uz',
                'password' => Hash::make('user123')
            ]
        ];

        foreach ($users as $user) {
            User::query()->create($user);
        }
    }
}
