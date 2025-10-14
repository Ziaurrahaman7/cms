<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CaseStudyNew extends Model
{
    protected $table = 'case_studies';
    
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'service_id',
        'client',
        'project_url',
        'project_date',
        'featured_image',
        'gallery_images',
        'sections',
        'work_process',
        'technologies',
        'challenges',
        'solutions',
        'results',
        'client_testimonial',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'challenges_image',
        'solutions_image',
        'results_image',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'project_date' => 'date',
        'gallery_images' => 'array',
        'sections' => 'array',
        'work_process' => 'array',
        'technologies' => 'array',
        'challenges' => 'array',
        'solutions' => 'array',
        'results' => 'array',
        'client_testimonial' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getClientTestimonialAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true) ?: [];
        }
        return $value ?: [];
    }
    
    public function getSectionsAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true) ?: [];
        }
        return $value ?: [];
    }
    
    public function getWorkProcessAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true) ?: [];
        }
        return $value ?: [];
    }
    
    public function getTechnologiesAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true) ?: [];
        }
        return $value ?: [];
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
        
        static::updating(function ($model) {
            if ($model->isDirty('title') && empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}