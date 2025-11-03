<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerHeroSection extends Model
{
    protected $fillable = ['title', 'short_description', 'our_partners_title', 'our_partners_description', 'worldwide_partners_title', 'worldwide_partners_description'];
}
