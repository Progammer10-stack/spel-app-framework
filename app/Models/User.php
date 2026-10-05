<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Eén rij uit de tabel users.
// Authenticatable betekent: Laravel kan met dit model inloggen.
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Alleen deze kolommen mag een formulier invullen.
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    // Deze velden worden verborgen als het model naar een array of JSON gaat.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // Bij opslaan wordt het wachtwoord automatisch gehasht. Nooit plat opslaan.
            'password' => 'hashed',
        ];
    }

    // Relatie: deze user heeft één rol (Admin of User).
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    // Geeft true terug als de rol de naam Admin heeft.
    // Het vraagteken voorkomt een fout als er geen rol gekoppeld is.
    public function isAdmin(): bool
    {
        return $this->role?->name === 'Admin';
    }

    // Relatie: één user kan meerdere orders hebben.
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Relatie: één user kan meerdere reviews hebben.
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
