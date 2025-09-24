<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;

return new class extends Migration
{
    public function up()
    {
        $statsSettings = [
            ['key' => 'stats_projects_completed', 'value' => '500+', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_projects_label', 'value' => 'Projects Completed', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_happy_clients', 'value' => '200+', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_happy_clients_label', 'value' => 'Happy Clients', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_years_experience', 'value' => '5+', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_years_experience_label', 'value' => 'Years Experience', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_countries_served', 'value' => '15+', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stats_countries_served_label', 'value' => 'Countries Served', 'type' => 'text', 'group' => 'stats'],
        ];

        foreach ($statsSettings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }

    public function down()
    {
        SiteSetting::where('group', 'stats')->delete();
    }
};