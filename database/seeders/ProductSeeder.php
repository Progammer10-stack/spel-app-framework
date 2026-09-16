<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $products = [
            [
                'name' => 'Catan',
                'description' => 'Bouw nederzettingen en handel met grondstoffen.',
                'category' => 'Bordspellen',
            ],
            [
                'name' => 'Ticket to Ride',
                'description' => 'Leg treinroutes aan door heel Europa.',
                'category' => 'Bordspellen',
            ],
            [
                'name' => 'Uno',
                'description' => 'Klassiek kaartspel voor jong en oud.',
                'category' => 'Kaartspellen',
            ],
            [
                'name' => 'Exploding Kittens',
                'description' => 'Humoristisch kaartspel met katten en explosies.',
                'category' => 'Kaartspellen',
            ],
            [
                'name' => 'Codenames',
                'description' => 'Raad woorden met behulp van geheime aanwijzingen.',
                'category' => 'Partyspellen',
            ],
            [
                'name' => 'Werewolves',
                'description' => 'Social deduction spel voor grotere groepen.',
                'category' => 'Partyspellen',
            ],
            [
                'name' => 'Carcassonne',
                'description' => 'Leg tegels en claim steden, wegen en kloosters.',
                'category' => 'Strategie',
            ],
            [
                'name' => 'Azul',
                'description' => 'Strategisch tegelspel met Portugese tegels.',
                'category' => 'Strategie',
            ],
            [
                'name' => 'Monopoly',
                'description' => 'Koop straten en word de rijkste speler.',
                'category' => 'Familie',
            ],
            [
                'name' => 'Cluedo',
                'description' => 'Los de moord op in het landhuis.',
                'category' => 'Familie',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'category_id' => $categories[$product['category']],
            ]);
        }
    }
}
