<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->nullable()->after('icon'); // security, cleaning, transportation, etc
            $table->json('features')->nullable()->after('full_description'); // Array of features
            $table->string('price_label')->nullable()->after('features'); // "Mulai dari Rp 3.5 Jt/bulan"
            $table->decimal('price_start', 15, 2)->nullable()->after('price_label'); // Starting price
            $table->json('benefits')->nullable()->after('price_start'); // Additional benefits
            $table->json('requirements')->nullable()->after('benefits'); // Service requirements
            $table->text('process_description')->nullable()->after('requirements'); // How it works
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'features',
                'price_label',
                'price_start',
                'benefits',
                'requirements',
                'process_description'
            ]);
        });
    }
};