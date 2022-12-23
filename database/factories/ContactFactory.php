<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->name,
            'external_id' => fake()->uuid,
            'email' => fake()->email,
            'primary_number' => fake()->randomNumber(8),
            'secondary_number' => fake()->randomNumber(8),
            'client_id' => 1,
            'is_primary' => 1,
        ];
    }
}
