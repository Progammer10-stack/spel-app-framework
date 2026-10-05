<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

// Slaat een nieuwe category op (create).
class store extends Controller
{
    public function store(Request $request)
    {
        // Controleer de invoer. Faalt dit, dan gaat de gebruiker terug naar het formulier.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'], // verplicht, tekst, maximaal 255 tekens
        ]);

        // Maak een nieuwe rij in de tabel categories.
        Category::create($data);

        // Terug naar de lijst, niet op het formulier blijven.
        return redirect()->route('categories.index');
    }
}
