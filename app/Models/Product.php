<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Eén rij uit de tabel products. Dit is een spel.
class Product extends Model
{
    // Deze drie kolommen mag een formulier opslaan.
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    // Relatie: dit product hoort bij één category.
    // category_id in deze tabel wijst naar id in categories.
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relatie: één product kan meerdere prijzen hebben.
    // Een nieuwe prijs is een nieuwe rij, de oude blijft staan.
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    // Relatie: één product kan meerdere reviews hebben.
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Relatie: één product kan op meerdere orderregels staan.
    public function orderRows(): HasMany
    {
        return $this->hasMany(OrderRow::class);
    }
}
