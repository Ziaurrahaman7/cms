<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'position', 'message', 'cv_file', 'status'
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
