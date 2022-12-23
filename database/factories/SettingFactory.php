<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{

    public function definition()
    {
        return [
            'client_number' => 10000,
            'invoice_number' => 10000,
            'company' => "test company",
            'max_users' => 10,
        ];
    }
}