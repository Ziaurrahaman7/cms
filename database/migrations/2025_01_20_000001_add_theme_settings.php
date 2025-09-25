<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;

return new class extends Migration
{
    public function up()
    {
        $themeSettings = [
            ['key' => 'theme_primary_color', 'value' => '#667eea', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_secondary_color', 'value' => '#764ba2', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_accent_color', 'value' => '#ffc107', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_success_color', 'value' => '#28a745', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_info_color', 'value' => '#17a2b8', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_warning_color', 'value' => '#ffc107', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_danger_color', 'value' => '#dc3545', 'type' => 'color', 'group' => 'theme'],
        ];

        foreach ($themeSettings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }

    public function down()
    {
        SiteSetting::where('group', 'theme')->delete();
    }
};