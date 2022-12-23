<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    public function configure(): ClientFactory
    {
        return $this->afterCreating(function (Client $client) {
            Contact::factory()->create([
                'client_id' => $client->id
            ]);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => fake()->uuid,
            'vat' => fake()->randomNumber(8),
            'company_name' => fake()->company(),
            'address' => fake()->secondaryAddress(),
            'city' => fake()->city(),
            'zipcode' => fake()->postcode(),
            'industry_id' => fake()->numberBetween($min = 1, $max = 25),
            'user_id' => User::factory(),
            'company_type' => 'ApS',
        ];
    }
}
