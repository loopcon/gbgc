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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('view')->nullable();
            $table->Integer('region_id')->nullable();
            $table->string('main_category')->nullable();
            $table->string('sub_category_1')->nullable();
            $table->string('sub_category_2')->nullable();
            $table->string('level_4')->nullable();
            $table->string('year')->nullable();
            $table->float('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
