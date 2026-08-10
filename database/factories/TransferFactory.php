<?php

namespace Database\Factories;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_code' => 'PED-' . $this->faker->unique()->numerify('####'),
            'amount' => $this->faker->randomFloat(2, 100, 2000),
            'transfer_date' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
