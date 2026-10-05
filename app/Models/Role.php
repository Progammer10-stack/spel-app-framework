<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Eén rij uit de tabel roles. In deze app: Admin of User.
class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relatie: één rol kan bij meerdere users horen.
    // In de tabel users staat daarvoor de kolom role_id.
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
