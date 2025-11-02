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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });
        
        // Generate slugs for existing records
        $portfolios = \App\Models\Portfolio::all();
        foreach ($portfolios as $portfolio) {
            $portfolio->slug = \Illuminate\Support\Str::slug($portfolio->title) . '-' . $portfolio->id;
            $portfolio->save();
        }
        
        // Make slug unique after populating data
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
