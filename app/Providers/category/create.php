<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;

// Toont het lege formulier om een category toe te voegen.
class create extends Controller implements \App\Contracts\Create
{
    public function create()
    {
        return view('categories.create');
    }
}
