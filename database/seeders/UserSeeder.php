<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::pluck('id', 'name');

        $users = [
            [
                'name' => 'Emma de Vries',
                'email' => 'emma@spelapp.nl',
                'role' => 'Admin',
            ],
            [
                'name' => 'Noah Bakker',
                'email' => 'noah@spelapp.nl',
                'role' => 'Customer',
            ],
            [
                'name' => 'Sara Jansen',
                'email' => 'sara@spelapp.nl',
                'role' => 'Customer',
            ],
            [
                'name' => 'Liam Visser',
                'email' => 'liam@spelapp.nl',
                'role' => 'Customer',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => 'password',
                'role_id' => $roles[$user['role']],
                'email_verified_at' => now(),
            ]);
        }
    }
}
