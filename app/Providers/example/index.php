<?php

namespace App\Providers\example;

use App\Http\Controllers\Controller;
use App\Models\Example;

class index extends Controller
{
    public function index()
    {
        $examples = Example::orderBy('name')->get();

        return view('examples.index', compact('examples'));
    }
}
