<?php
namespace Database\Factories;

use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->name,
            'external_id' => fake()->uuid,
            'description' => fake()->text(),
            'number' => fake()->uuid(),
            'price' => fake()->numberBetween(1000,10000),
            'default_type' => 'hours',
            'archived' => false,
        ];
    }
}