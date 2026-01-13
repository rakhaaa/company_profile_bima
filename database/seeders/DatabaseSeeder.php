<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed in order
        $this->call([
            // Admin Users
            AdminUserSeeder::class,

            // Website Content
            HeroSlidesTableSeeder::class,
            StatsTableSeeder::class,
            ServicesTableSeeder::class,
            ClientsTableSeeder::class,
            WhyFeaturesTableSeeder::class,
        ]);

        // Optional: Generate dummy data for testing
        if (app()->environment('local')) {
            $this->command->info('🧪 Generating test data...');

            // Generate 20 contact submissions
            \App\Models\ContactSubmission::factory(20)->create();

            // Generate 30 career applications
            \App\Models\CareerApplication::factory(30)->create();

            $this->command->info('✅ Test data generated successfully!');
        }
    }
}
