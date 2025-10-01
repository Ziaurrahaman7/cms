<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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
            $table->json('sections')->nullable(); // Multiple sections
            $table->json('work_process')->nullable(); // Multiple work process steps
            $table->json('technologies')->nullable(); // Technologies used
            $table->json('challenges')->nullable(); // Project challenges
            $table->json('solutions')->nullable(); // Solutions provided
            $table->json('results')->nullable(); // Project results/outcomes
            $table->json('client_testimonial')->nullable(); // Client feedback
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('challenges_image')->nullable();
            $table->string('solutions_image')->nullable();
            $table->string('results_image')->nullable();
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