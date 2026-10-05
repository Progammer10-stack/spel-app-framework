<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;

class create extends Controller
{
    public function create()
    {
        return view('categories.create');
    }
}
