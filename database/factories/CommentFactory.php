<?php
namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
class CommentFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'user_id' => User::factory(),
            'source_type' => Task::class,
            'source_id' => Task::factory(),
            'description' => fake()->paragraph(rand(2,10))
        ];
    }
}
