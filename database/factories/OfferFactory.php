<?php
namespace Database\Factories;

use App\Enums\OfferStatus;
use App\Models\Client;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'client_id' => Client::factory(),
            'status' => OfferStatus::inProgress()->getStatus(),
            'source_id' => Lead::factory(),
            'source_type' => Lead::class,
        ];
    }
}
