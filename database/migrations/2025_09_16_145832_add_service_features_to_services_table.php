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
        Schema::table('services', function (Blueprint $table) {
            $table->json('key_features')->nullable();
            $table->json('we_serve')->nullable();
            $table->json('service_overview')->nullable();
            $table->json('technologies')->nullable();
            $table->json('portfolio_items')->nullable();
            $table->json('process_steps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['key_features', 'we_serve', 'service_overview', 'technologies', 'portfolio_items', 'process_steps']);
        });
    }
};
