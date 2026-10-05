<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Eén rij uit de tabel reviews. Een opmerking van een klant over een product.
class Review extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'product_id',
    ];

    // Relatie: de user die de review schreef.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relatie: het product waar de review over gaat.
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
