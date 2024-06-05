<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'amount' => 'integer',
        'status' => PaymentStatus::class
    ];

    protected $fillable = [
        'customer_id',
        'order_id',
        'trx_id',
        'amount',
        'method',
        'status',
        'proof_image_url'
    ];

    public function customer(): BelongsTo 
    {
        return $this->belongsTo(Customer::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
