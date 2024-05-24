<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'total_price' => 'integer',
        'total_qty' => 'integer',
        'status' => OrderStatus::class
    ];

    protected $fillable = [
        'customer_id',
        'garment_id',
        'code',
        'total_price',
        'total_qty',
        'note',
        'status'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function garment(): BelongsTo
    {
        return $this->belongsTo(Garment::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
}
