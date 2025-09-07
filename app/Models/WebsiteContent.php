<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    protected $fillable = ['section', 'key', 'value', 'type'];
    
    public static function getContent($section, $key, $default = '')
    {
        $content = self::where('section', $section)->where('key', $key)->first();
        return $content ? $content->value : $default;
    }
}
