<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name', 'slug', 'type', 'website', 'description', 'country', 'logo', 'sort_order', 'is_active', 'sections', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sections' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
