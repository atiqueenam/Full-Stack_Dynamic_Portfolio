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
        Schema::table('infos', function (Blueprint $table) {
            $table->text('scienthush_description')->nullable();
            $table->string('scienthush_facebook_url')->nullable();
            $table->string('scienthush_youtube_url')->nullable();
            $table->json('scienthush_featured_videos')->nullable(); // Store video URLs as JSON
            $table->boolean('show_scienthush_section')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn([
                'scienthush_description',
                'scienthush_facebook_url', 
                'scienthush_youtube_url',
                'scienthush_featured_videos',
                'show_scienthush_section'
            ]);
        });
    }
};
