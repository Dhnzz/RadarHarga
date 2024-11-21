<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $fillable = [
        'name',
        'unit',
    ];

    public function harga(): HasMany
    {
        return $this->hasMany(Harga::class);
    }
    public function hargaLatest(): HasMany
    {
        return $this->hasMany(Harga::class)->latest('date');
    }
    public function hargaOldest(): HasMany
    {
        return $this->hasMany(Harga::class)->oldest('date');
    }
}
