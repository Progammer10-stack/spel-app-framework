<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Eén rij uit de tabel categories. Bijvoorbeeld "Strategie" of "Familie".
class Category extends Model
{
    // Alleen deze kolom mag via een formulier worden ingevuld.
    // Andere kolommen, zoals id, blijven beschermd.
    protected $fillable = [
        'name',
    ];

    // Relatie: één category heeft veel producten.
    // In de tabel products staat daarvoor de kolom category_id.
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
