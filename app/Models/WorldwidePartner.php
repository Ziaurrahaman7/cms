<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldwidePartner extends Model
{
    protected $fillable = ['name', 'logo', 'country', 'is_active', 'sort_order'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}