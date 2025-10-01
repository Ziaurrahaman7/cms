<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'image',
        'client',
        'project_url',
        'project_date',
        'is_active',
        'sort_order',
        'work_process',
        'business_cases',
        'client_reviews',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'project_date' => 'date',
        'work_process' => 'array',
        'business_cases' => 'array',
        'client_reviews' => 'array'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
    
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
    
    public function getRouteKeyName()
    {
        return 'id';
    }
}
