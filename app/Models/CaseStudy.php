<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'category',
        'client_name',
        'project_duration',
        'technologies',
        'results',
        'is_active',
        'is_featured',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'technologies' => 'array',
        'results' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}