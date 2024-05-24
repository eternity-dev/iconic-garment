<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Garment extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'phone',
        'image_url'
    ];

    public function address(): HasOne
    {
        return $this->hasOne(GarmentAddress::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
