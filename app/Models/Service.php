<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'icon',
        'image',
        'is_active',
        'sort_order',
        'sections',
        'we_serve',
        'service_overview',
        'technologies',
        'process_steps'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sections' => 'array',
        'we_serve' => 'array',
        'service_overview' => 'array',
        'technologies' => 'array',
        'process_steps' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
        
        static::updating(function ($service) {
            if ($service->isDirty('title') && empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }
}
