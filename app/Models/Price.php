<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Eén rij uit de tabel prices. Een prijs van een product vanaf een datum.
class Price extends Model
{
    protected $fillable = [
        'price',
        'effective_date',
        'product_id',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2', // altijd 2 decimalen, bijvoorbeeld 19.95
            'effective_date' => 'date', // datum zonder tijd
        ];
    }

    // Relatie: deze prijs hoort bij één product.
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
