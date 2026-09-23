<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id', 'email');

        $orders = [
            [
                'email' => 'noah@spelapp.nl',
                'ordered_at' => now()->subDays(12),
                'status' => 2,
            ],
            [
                'email' => 'sara@spelapp.nl',
                'ordered_at' => now()->subDays(5),
                'status' => 1,
            ],
            [
                'email' => 'liam@spelapp.nl',
                'ordered_at' => now()->subDay(),
                'status' => 0,
            ],
        ];

        foreach ($orders as $order) {
            Order::create([
                'user_id' => $users[$order['email']],
                'ordered_at' => $order['ordered_at'],
                'status' => $order['status'],
            ]);
        }
    }
}
