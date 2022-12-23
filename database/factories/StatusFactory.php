<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'title' => fake()->word,
            'color' => '#000',
        ];
    }
}