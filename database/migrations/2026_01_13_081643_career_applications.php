<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('position_applied'); // Security, Cleaning, Driver
            $table->text('address');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('education_level');
            $table->string('cv_path')->nullable();
            $table->string('photo_path')->nullable();
            $table->text('experience')->nullable();
            $table->enum('status', ['pending', 'reviewing', 'shortlisted', 'interview', 'accepted', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};