<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'ordered_at',
        'user_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'ordered_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderRows(): HasMany
    {
        return $this->hasMany(OrderRow::class);
    }
}
