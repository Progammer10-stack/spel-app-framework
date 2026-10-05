<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\User;

class create extends Controller
{
    public function create()
    {
        $users = User::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('orders.create', compact('users'));
    }
}
