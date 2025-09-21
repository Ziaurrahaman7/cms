<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
        'features',
        'specifications',
        'faqs',
        'testimonials',
        'gallery',
        'pricing',
        'sections',
        'why_choose',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
        'faqs' => 'array',
        'testimonials' => 'array',
        'gallery' => 'array',
        'pricing' => 'array',
        'sections' => 'array',
        'why_choose' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }
}
