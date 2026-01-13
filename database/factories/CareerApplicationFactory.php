<?php

namespace Database\Factories;

use App\Models\CareerApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

class CareerApplicationFactory extends Factory
{
    protected $model = CareerApplication::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'position_applied' => $this->faker->randomElement(['Security Guard', 'Cleaning Service', 'Driver']),
            'address' => $this->faker->address(),
            'birth_date' => $this->faker->dateTimeBetween('-50 years', '-18 years'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'education_level' => $this->faker->randomElement(['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2']),
            'experience' => $this->faker->optional()->paragraphs(2, true),
            'status' => $this->faker->randomElement(['pending', 'reviewing', 'shortlisted', 'interview', 'accepted', 'rejected']),
            'admin_notes' => $this->faker->optional()->paragraph(),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    public function accepted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'accepted',
        ]);
    }
}