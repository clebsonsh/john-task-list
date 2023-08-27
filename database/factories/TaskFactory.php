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

        return [
            'user' => fake()->name(),
            'title' => fake()->catchPhrase(),
            'description' => fake()->realText(),
            'completed' => $completed,
            'completed_at' => $completed ? now()->subDays($subDays - (rand(16, 30))) : null,
            'created_at' => now()->subDays($subDays),
            'updated_at' => now()->subDays($subDays - rand(2, 15)),
            'deleted_at' =>  fake()->boolean(10) ? now()->subDays($subDays - rand(31, 60)) : null,
        ];
    }
}
