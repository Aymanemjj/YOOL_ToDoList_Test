<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        $ids = User::pluck('id');

        return [
            'title'       => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status'      => fake()->randomElement(['todo', 'in_progress', 'done']),
            'due_date'    => fake()->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'user_id'     => $ids->random(),
        ];
    }
}