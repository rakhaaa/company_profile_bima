<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_positions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['security', 'cleaning', 'driver', 'office']);
            $table->text('description');
            $table->json('requirements')->nullable();
            $table->string('location');
            $table->enum('employment_type', ['full_time', 'part_time', 'contract'])->default('full_time');
            $table->integer('quota')->default(1);
            $table->date('deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('type');
            $table->index('is_active');
        });

        Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('job_position_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('education');
            $table->text('experience')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('photo')->nullable();
            $table->json('certificates')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'interview', 'accepted', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
        Schema::dropIfExists('job_positions');
    }
};