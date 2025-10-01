<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CTASection extends Model
{
    protected $table = 'home_sections';
    
    protected $fillable = [
        'section_key',
        'title',
        'description',
        'button_text',
        'button_link',
        'secondary_button_text',
        'secondary_button_link',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getSection($key, $defaults = [])
    {
        $section = self::where('section_key', $key)->first();
        
        if (!$section) {
            return (object) array_merge([
                'title' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '',
                'secondary_button_text' => '',
                'secondary_button_link' => '',
                'is_active' => true
            ], $defaults);
        }
        
        return $section;
    }
}