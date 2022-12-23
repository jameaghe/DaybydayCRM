<?php
namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
class AppointmentFactory extends Factory {

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'title' => fake()->word,
            'description' => fake()->text,
            'start_at' => now(),
            'end_at' => now()->addHour(),
            'user_id' => User::factory(),
            'source_type' => Task::class,
            'source_id' => Task::factory()
        ];
    }
}
