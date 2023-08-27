<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $completed = fake()->boolean();
        $subDays = rand(61, 365);
        $createdAt = now()->subDays($subDays);
        $upddateAt = now()->subDays($subDays - rand(2, 15));
        $completedAt = $completed ? now()->subDays($subDays - (rand(16, 30))) : null;
        $deletedAt = fake()->boolean(10) ? now()->subDays($subDays - rand(31, 60)) : null;
        return [
            'user' => fake()->name(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'completed' => $completed,
            'completed_at' => $completedAt,
            'created_at' => $createdAt,
            'updated_at' => $upddateAt,
            'deleted_at' => $deletedAt,
        ];
    }
}
