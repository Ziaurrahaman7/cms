<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPageSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description', 
        'hero_button_text',
        'why_join_title',
        'why_join_description',
        'benefits'
    ];
    
    protected $casts = [
        'benefits' => 'array'
    ];
    
    public static function getSettings()
    {
        return self::first() ?? new self([
            'hero_title' => 'Join Our Team',
            'hero_description' => 'Build your career with us and be part of an innovative team that\'s shaping the future of technology.',
            'hero_button_text' => 'View Openings',
            'why_join_title' => 'Why Join With Us?',
            'why_join_description' => 'Discover the benefits and opportunities that make us a great place to work',
            'benefits' => [
                [
                    'title' => 'Great Team',
                    'description' => 'Work with talented professionals who are passionate about technology and innovation.',
                    'icon' => 'bi bi-people'
                ],
                [
                    'title' => 'Career Growth', 
                    'description' => 'Advance your career with continuous learning opportunities and skill development programs.',
                    'icon' => 'bi bi-graph-up-arrow'
                ],
                [
                    'title' => 'Work-Life Balance',
                    'description' => 'Enjoy flexible working hours and a supportive environment that values your well-being.',
                    'icon' => 'bi bi-heart'
                ],
                [
                    'title' => 'Competitive Benefits',
                    'description' => 'Attractive salary packages, health benefits, and performance-based incentives.',
                    'icon' => 'bi bi-award'
                ]
            ]
        ]);
    }
}
