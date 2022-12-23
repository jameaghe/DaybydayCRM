<?php
namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'status' => 'draft',
            'client_id' => Client::factory(),
        ];
    }
}
