<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaande user op (update).
class update extends Controller
{
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // unique: e-mail mag niet van een andere user zijn. Het eigen id is uitgezonderd.
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update($data);

        return redirect()->route('users.index');
    }
}
