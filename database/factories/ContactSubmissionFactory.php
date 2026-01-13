<?php

namespace Database\Factories;

use App\Models\ContactSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactSubmission>
 */
class ContactSubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = ContactSubmission::class;

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
            'company' => fake()->company(),
            'subject' => fake()->sentence(6),
            'message' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['new', 'read', 'replied', 'archived']),
            'admin_notes' => fake()->optional()->paragraph(),
        ];
    }

    /**
     * Indicate that the submission is new.
     */
    // public function new(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'status' => 'new',
    //         'admin_notes' => null,
    //     ]);
    // }

    /**
     * Indicate that the submission has been read.
     */
    public function read(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'read',
        ]);
    }

    /**
     * Indicate that the submission has been replied to.
     */
    public function replied(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'replied',
            'admin_notes' => fake()->paragraph(),
        ]);
    }
}
