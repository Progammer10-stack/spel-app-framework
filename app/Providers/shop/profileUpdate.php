<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Wijzigt naam en e-mail van de ingelogde gebruiker. De rol blijft User.
class profileUpdate extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        // Het eigen e-mailadres mag blijven. Een adres van iemand anders niet.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ], [
            'name.required' => 'Je account is niet opgeslagen. Vul je naam in.',
            'email.required' => 'Je account is niet opgeslagen. Vul je e-mailadres in.',
            'email.email' => 'Je account is niet opgeslagen. Vul een geldig e-mailadres in.',
            'email.unique' => 'Je account is niet opgeslagen. Dit e-mailadres is al in gebruik.',
        ]);

        $user->update($data);

        return redirect()
            ->route('shop.profile.edit')
            ->with('success', 'Je account is opgeslagen.');
    }
}
