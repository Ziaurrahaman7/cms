<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'technology_category_id',
        'icon',
        'is_active',
        'sort_order'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
    
    public function category()
    {
        return $this->belongsTo(TechnologyCategory::class, 'technology_category_id');
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
