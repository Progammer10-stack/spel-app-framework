<?php

namespace Database\Seeders;

use App\Models\Example;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    public function run(): void
    {
        $examples = [
            'Voorbeeld bordspel',
            'Voorbeeld kaartspel',
            'Voorbeeld partyspel',
        ];

        foreach ($examples as $name) {
            Example::create(['name' => $name]);
        }
    }
}
