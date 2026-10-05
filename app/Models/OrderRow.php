<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Eén rij uit de tabel order_rows.
// Koppelt één product aan één order. De order zelf staat in orders.
class OrderRow extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    // Relatie: deze regel hoort bij één order.
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Relatie: deze regel hoort bij één product.
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
