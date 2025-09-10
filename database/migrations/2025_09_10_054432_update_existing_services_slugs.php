<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing services with slugs
        $services = \App\Models\Service::whereNull('slug')->orWhere('slug', '')->get();
        
        foreach ($services as $service) {
            $service->slug = \Illuminate\Support\Str::slug($service->title);
            $service->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
