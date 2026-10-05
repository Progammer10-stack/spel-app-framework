<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Eén rij uit de tabel orders. Dit is een bestelling van een klant.
class Order extends Model
{
    // status is een getal: 0 = nieuw, 1 = betaald, 2 = verzonden.
    protected $fillable = [
        'ordered_at',
        'user_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            // Zet de tekst uit de database om naar een datum, zodat format() werkt.
            'ordered_at' => 'datetime',
        ];
    }

    // Relatie: deze order hoort bij één user (de klant).
    // user_id wijst naar id in de tabel users.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relatie: één order heeft meerdere orderregels (de producten in de bestelling).
    public function orderRows(): HasMany
    {
        return $this->hasMany(OrderRow::class);
    }
}
