<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $icons = ['🛡️', '🧹', '🚗', '👁️', '📹', '💼'];
        $titles = [
            'Security Guard',
            'Cleaning Service',
            'Driver Service',
            'Patrol & Monitoring',
            'CCTV & Security System',
            'Security Consulting'
        ];

        $title = fake()->randomElement($titles);

        return [
            'title' => $title,
            'icon' => fake()->randomElement($icons),
            'description' => fake()->paragraph(2),
            'full_description' => fake()->paragraphs(3, true),
            'order' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}