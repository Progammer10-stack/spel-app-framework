<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderRow;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderRowSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::pluck('id', 'name');
        $users = User::pluck('id', 'email');

        $rows = [
            'noah@spelapp.nl' => ['Catan', 'Uno'],
            'sara@spelapp.nl' => ['Azul', 'Monopoly'],
            'liam@spelapp.nl' => ['Ticket to Ride'],
        ];

        foreach ($rows as $email => $productNames) {
            $order = Order::where('user_id', $users[$email])->first();

            foreach ($productNames as $name) {
                OrderRow::create([
                    'order_id' => $order->id,
                    'product_id' => $products[$name],
                ]);
            }
        }
    }
}
