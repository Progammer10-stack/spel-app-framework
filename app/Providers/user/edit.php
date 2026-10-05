<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

// Toont het formulier om een bestaande user te wijzigen.
class edit extends Controller
{
    public function edit(User $user)
    {
        // Alle rollen voor de dropdown.
        $roles = Role::orderBy('name')->get();

        return view('users.edit', compact('user', 'roles'));
    }
}
