<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('badge_icon')->default('🏆');
            $table->string('badge_text');
            $table->string('title');
            $table->string('highlight_text');
            $table->text('description');
            $table->string('primary_button_text');
            $table->string('primary_button_link');
            $table->string('secondary_button_text');
            $table->string('secondary_button_link');
            $table->string('background_image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};