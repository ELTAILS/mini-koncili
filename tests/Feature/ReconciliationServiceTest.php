<?php

use App\Models\Reconciliation;
use App\Models\Sale;
use App\Models\Transfer;
use App\Models\User;
use App\Services\ReconciliationService;

it('marca como conciliado', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $sale = Sale::factory()->create([
        'user_id' => $user->id,
        'order_code' => 'PED-1001',
        'gross_amount' => 1000,
        'commission_amount' => 200,
        'fee_amount' => 50,
    ]);

    Transfer::factory()->create([
        'user_id' => $user->id,
        'order_code' => 'PED-1001',
        'amount' => 750,
        'transfer_date' => now()
    ]);

    $reconciliation = new Reconciliation();
    $service = new ReconciliationService();
    $result = $service->reconcile($sale, $reconciliation);

    expect($result->status)->toBe('conciliado');

});

it('marca como pedente', function () {
    $user = User::factory()->create();

    $sale = Sale::factory()->create([
        'user_id' => $user->id,
        'order_code' => 'PED-1001',
        'gross_amount' => 1000,
        'commission_amount' => 200,
        'fee_amount' => 50,
    ]);

    //Sem o Transfer

    $reconciliation = new Reconciliation();
    $service = new ReconciliationService();
    $result = $service->reconcile($sale, $reconciliation);

    expect($result->status)->toBe('pendente');

});

it('marca como divergente', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $sale = Sale::factory()->create([
        'user_id' => $user->id,
        'order_code' => 'PED-1001',
        'gross_amount' => 1000,
        'commission_amount' => 200,
        'fee_amount' => 50,
    ]);

    Transfer::factory()->create([
        'user_id' => $user->id,
        'order_code' => 'PED-1001',
        'amount' => 800, //valor diferente
        'transfer_date' => now()
    ]);

    $reconciliation = new Reconciliation();
    $service = new ReconciliationService();
    $result = $service->reconcile($sale, $reconciliation);

    expect($result->status)->toBe('divergente');

});
