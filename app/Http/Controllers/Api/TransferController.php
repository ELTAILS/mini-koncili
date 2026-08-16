<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\TransferResource;
use App\Models\Transfer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $transfers = Transfer::where('user_id', Auth::id())->get();

        return TransferResource::collection($transfers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransferRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $transfer = Transfer::create([...$validated, 'user_id' => Auth::id()]);

        return response()->json([
            'status' => true,
            'message' => 'Transferencia criada com sucesso!',
            'data' => new TransferResource($transfer),
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transfer = Transfer::where('user_id', Auth::id())->findOrFail($id);

        return new TransferResource($transfer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransferResource $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transfer = Transfer::where('user_id', Auth::id())->findOrFail($id);

        $transfer->delete();

        return response()->json(['transferência excluida com sucesso']);
    }
}
