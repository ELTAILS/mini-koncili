<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $user = User::factory()->create([
        'name' => 'Wagner Demo',
        'email' => 'wagner@gmail.com',
        'password' => bcrypt('password'),
    ]);

    Sale::factory()->create(['user_id' => $user->id, 'order_code' => 'PED-1001', 'gross_amount' => 500, 'commission_amount' => 50, 'fee_amount' => 10]);
    Transfer::factory()->create(['user_id' => $user->id, 'order_code' => 'PED-1001', 'amount' => 440]); 

    Sale::factory()->create(['user_id' => $user->id, 'order_code' => 'PED-1002', 'gross_amount' => 300, 'commission_amount' => 30, 'fee_amount' => 6]);
    Transfer::factory()->create(['user_id' => $user->id, 'order_code' => 'PED-1002', 'amount' => 224]);

    Sale::factory()->create(['user_id' => $user->id, 'order_code' => 'PED-1003', 'gross_amount' => 800, 'commission_amount' => 80, 'fee_amount' => 16]);

    Sale::factory(10)->create(['user_id' => $user->id]);
    Transfer::factory(10)->create(['user_id' => $user->id]);
}
}
