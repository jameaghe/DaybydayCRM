<?php
namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => fake()->sentence,
            'external_id' => fake()->uuid,
            'description' => fake()->paragraph,
            'user_created_id' => User::factory(),
            'user_assigned_id' => User::factory(),
            'client_id' => Client::factory(),
            'status_id' => fake()->numberBetween(1, 4),
            'deadline' => fake()->dateTimeThisYear('now'),
            'created_at' => fake()->dateTimeThisYear('now'),
            'updated_at' => fake()->dateTimeThisYear('now'),
        ];
    }
}