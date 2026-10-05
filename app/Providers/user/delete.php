<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\User;

// Verwijdert één user (delete).
class delete extends Controller
{
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
