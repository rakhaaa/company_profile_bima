<?php

namespace Database\Factories;

use App\Models\CareerApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CareerApplication>
 */
class CareerApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = CareerApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'position_applied' => fake()->randomElement(['Security Guard', 'Cleaning Service', 'Driver']),
            'address' => fake()->address(),
            'birth_date' => fake()->dateTimeBetween('-50 years', '-18 years'),
            'gender' => fake()->randomElement(['male', 'female']),
            'education_level' => fake()->randomElement(['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2']),
            'experience' => fake()->optional()->paragraphs(2, true),
            'status' => fake()->randomElement(['pending', 'reviewing', 'shortlisted', 'interview', 'accepted', 'rejected']),
            'admin_notes' => fake()->optional()->paragraph(),
        ];
    }

    /**
     * Indicate that the application is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'admin_notes' => null,
        ]);
    }

    /**
     * Indicate that the application has been accepted.
     */
    public function accepted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'accepted',
            'admin_notes' => fake()->paragraph(),
        ]);
    }

    /**
     * Indicate that the application has been rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
            'admin_notes' => 'Terima kasih atas minat Anda.',
        ]);
    }

    /**
     * Indicate that the application is in interview stage.
     */
    public function interview(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'interview',
            'admin_notes' => 'Terjadwal untuk interview.',
        ]);
    }
}
