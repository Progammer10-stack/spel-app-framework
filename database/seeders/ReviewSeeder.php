<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::pluck('id', 'name');
        $users = User::pluck('id', 'email');

        $reviews = [
            [
                'email' => 'noah@spelapp.nl',
                'product' => 'Catan',
                'comment' => 'Geweldig familiespel. We spelen het elk weekend.',
            ],
            [
                'email' => 'sara@spelapp.nl',
                'product' => 'Azul',
                'comment' => 'Mooi ontwerp en makkelijk te leren, maar lastig om te winnen.',
            ],
            [
                'email' => 'liam@spelapp.nl',
                'product' => 'Codenames',
                'comment' => 'Perfect voor een spelavond met vrienden.',
            ],
            [
                'email' => 'emma@spelapp.nl',
                'product' => 'Ticket to Ride',
                'comment' => 'Duidelijke regels en een mooie speelduur.',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create([
                'comment' => $review['comment'],
                'user_id' => $users[$review['email']],
                'product_id' => $products[$review['product']],
            ]);
        }
    }
}
