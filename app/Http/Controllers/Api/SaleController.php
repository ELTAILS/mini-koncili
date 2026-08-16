<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $sales = Sale::where('user_id', Auth::id())->get();

        return SaleResource::collection($sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $sale = Sale::create([...$validated, 'user_id' => Auth::id()]);

        return response()->json([
            'status' => true,
            'message' => 'Venda criada com sucesso',
            'data' => new SaleResource($sale),
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResource
    {
        $sale = Sale::where('user_id', Auth::id())->findOrFail($id);

        return new SaleResource($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $sale = Sale::where('user_id', Auth::id())->findOrFail($id);

        $sale->delete();

        return response()->json(['message' => 'Venda excluído com sucesso']);
    }
}
