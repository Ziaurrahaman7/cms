<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name', 'slug', 'type', 'website', 'description', 'logo', 'sort_order', 'active', 'sections'
    ];

    protected $casts = [
        'active' => 'boolean',
        'sections' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
