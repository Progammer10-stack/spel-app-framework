<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;

// Toont het lege formulier om een category toe te voegen.
class create extends Controller
{
    public function create()
    {
        // Er hoeft niets uit de database mee, het formulier heeft alleen een naamveld.
        return view('categories.create');
    }
}
