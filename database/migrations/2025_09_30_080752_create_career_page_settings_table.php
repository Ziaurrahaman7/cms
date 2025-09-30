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
        Schema::create('career_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('Join Our Team');
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->default('View Openings');
            $table->string('why_join_title')->default('Why Join With Us?');
            $table->text('why_join_description')->nullable();
            $table->json('benefits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_page_settings');
    }
};
