<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('case_studies');
        
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('category');
            $table->string('client')->nullable();
            $table->string('project_url')->nullable();
            $table->date('project_date')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->json('sections')->nullable();
            $table->json('work_process')->nullable();
            $table->json('technologies')->nullable();
            $table->text('challenges')->nullable();
            $table->string('challenges_image')->nullable();
            $table->text('solutions')->nullable();
            $table->string('solutions_image')->nullable();
            $table->text('results')->nullable();
            $table->string('results_image')->nullable();
            $table->json('client_testimonial')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};