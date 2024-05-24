<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderProduct extends Model
{
    use HasFactory;

    protected $casts = [
        'total_qty' => 'integer'
    ];

    protected $fillable = [
        'order_id',
        'product_id',
        'total_qty'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(OrderProductSize::class);
    }
}