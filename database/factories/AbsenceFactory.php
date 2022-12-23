<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Absence;
use App\Models\User;


class AbsenceFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'reason' => fake()->word,
            'start_at' => now(),
            'end_at' => now()->addDays(3),
            'user_id' => User::factory(),
        ];
    }
}