<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function configure(): UserFactory
    {
        return $this->afterCreating(function (User $user) {
            $user->department()->attach(Department::first()->id);
        });
    }

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'external_id' => fake()->uuid,
            'email' => fake()->email,
            'password' => bcrypt('secretpassword'),
            'address' => fake()->secondaryAddress(),
            'primary_number' => fake()->randomNumber(8),
            'secondary_number' => fake()->randomNumber(8),
            'remember_token' => null,
            'language' => 'en',
        ];
    }
}
