<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReconciliationResource;
use App\Models\Reconciliation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ReconciliationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $reconciliations = Reconciliation::with('sale')
            ->whereHas('sale', fn ($q) => $q->where('user_id', Auth::id()))
            ->get();

        return ReconciliationResource::collection($reconciliations);
    }
}
