<?php
namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{

    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'invoice_id' => Invoice::factory(),
            'amount' => 1000,
            'payment_date' => today(),
            'payment_source' => 'bank'
        ];
    }
}