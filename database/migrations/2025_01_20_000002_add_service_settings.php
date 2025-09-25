<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;

return new class extends Migration
{
    public function up()
    {
        $serviceSettings = [
            ['key' => 'service_section_title', 'value' => 'Our Services', 'type' => 'text', 'group' => 'service'],
            ['key' => 'service_section_description', 'value' => 'Comprehensive IT solutions to drive your business forward', 'type' => 'summernote', 'group' => 'service'],
        ];

        foreach ($serviceSettings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }

    public function down()
    {
        SiteSetting::where('group', 'service')->delete();
    }
};