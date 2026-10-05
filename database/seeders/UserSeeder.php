<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Maak een lijstje: rolnaam => id. Bijvoorbeeld Admin => 1.
        $roles = Role::pluck('id', 'name');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@spelapp.nl',
                'role' => 'Admin',
            ],
            [
                'name' => 'Emma de Vries',
                'email' => 'emma@spelapp.nl',
                'role' => 'User',
            ],
            [
                'name' => 'Noah Bakker',
                'email' => 'noah@spelapp.nl',
                'role' => 'User',
            ],
            [
                'name' => 'Sara Jansen',
                'email' => 'sara@spelapp.nl',
                'role' => 'User',
            ],
            [
                'name' => 'Liam Visser',
                'email' => 'liam@spelapp.nl',
                'role' => 'User',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => 'password',
                    'role_id' => $roles[$user['role']],
                    'email_verified_at' => now(),
                ],
            );
        }
    }
}
