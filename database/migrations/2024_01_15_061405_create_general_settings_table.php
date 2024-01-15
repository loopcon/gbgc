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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('aboutus')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('copyrignt_year')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('admin_password')->nullable();
            $table->text('logo')->nullable();
            $table->text('fevicon')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('canonical_tag')->nullable();
            $table->text('google_tag_manager')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
