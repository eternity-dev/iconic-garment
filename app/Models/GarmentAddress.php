<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GarmentAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'garment_id',
        'address',
        'city',
        'province',
        'country',
        'zip'
    ];

    public function garment(): BelongsTo
    {
        return $this->belongsTo(Garment::class);
    }
}
