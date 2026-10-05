<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Verwijdert één category (delete).
class delete extends Controller
{
    public function delete(Category $category)
    {
        // Haal deze rij uit de tabel categories.
        $category->delete();

        return redirect()->route('categories.index');
    }
}
