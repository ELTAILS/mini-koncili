<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gross = $this->faker->randomFloat(2, 10, 2000);

        return [
            'order_code' => 'PED-' . $this->faker->unique()->numerify('####'),
            'sale_date' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'gross_amount' => $gross,
            'commission_amount' => round($gross * 0.10, 2), // 10% de comissão
            'fee_amount' => round($gross * 0.02, 2),         // 2% de taxa
        ];
    }
}
