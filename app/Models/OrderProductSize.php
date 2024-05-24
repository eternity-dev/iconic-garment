<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductSize extends Model
{
    use HasFactory;

    protected $casts = [
        'qty' => 'integer'
    ];

    protected $fillable = [
        'order_product_id',
        'size',
        'qty'
    ];
}
