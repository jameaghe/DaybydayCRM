<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceLineFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'external_id' => fake()->uuid,
            'type' => fake()->randomElement(['pieces', 'hours', 'days', 'session', 'kg', 'package']),
            'quantity' => fake()->randomNumber(1),
            'price' => fake()->randomNumber(4),
        ];
    }
}