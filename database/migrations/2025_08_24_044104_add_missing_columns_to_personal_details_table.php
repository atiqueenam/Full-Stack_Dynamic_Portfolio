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
        Schema::table('personal_details', function (Blueprint $table) {
            // Add missing columns that the controller and form expect
            $table->string('full_name')->nullable()->after('user_id');
            $table->string('title')->nullable()->after('full_name');
            $table->text('bio')->nullable()->after('title');
            $table->string('phone')->nullable()->after('bio');
            $table->string('email')->nullable()->after('phone');
            $table->string('location')->nullable()->after('email');
            $table->string('website')->nullable()->after('location');
            $table->string('linkedin')->nullable()->after('website');
            $table->string('github')->nullable()->after('linkedin');
            $table->string('twitter')->nullable()->after('github');
            $table->string('facebook')->nullable()->after('twitter');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('youtube')->nullable()->after('instagram');
            $table->string('profile_image')->nullable()->after('youtube');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_details', function (Blueprint $table) {
            // Drop the added columns
            $table->dropColumn([
                'full_name', 'title', 'bio', 'phone', 'email', 'location',
                'website', 'linkedin', 'github', 'twitter', 'facebook',
                'instagram', 'youtube', 'profile_image'
            ]);
        });
    }
};
