<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            'Catan' => 39.99,
            'Ticket to Ride' => 44.95,
            'Uno' => 9.99,
            'Exploding Kittens' => 19.95,
            'Codenames' => 19.99,
            'Werewolves' => 16.50,
            'Carcassonne' => 29.95,
            'Azul' => 34.99,
            'Monopoly' => 24.99,
            'Cluedo' => 27.50,
        ];

        foreach ($prices as $name => $amount) {
            $product = Product::where('name', $name)->first();

            Price::create([
                'price' => $amount,
                'effective_date' => now()->toDateString(),
                'product_id' => $product->id,
            ]);
        }
    }
}
