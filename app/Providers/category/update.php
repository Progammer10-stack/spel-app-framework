<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaande category op (update).
class update extends Controller
{
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Overschrijf de oude naam met de nieuwe.
        $category->update($data);

        return redirect()->route('categories.index');
    }
}
