<?php

namespace App\Policies;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class salePolicy
{
    /**
     * Determina que o usuário pode visualizar qualquer modelo.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine se o usuário pode visualizar o modelo.
     */
    public function view(User $user, Sale $sale): bool
    {
        return $user->id === $sale->user_id;
    }

    /**
     * Derermine se o usuário pode criar modelos.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Derermine se o usuário pode atualizar o modelo.
     */
    public function update(User $user, Sale $sale): bool
    {
        return false;
    }

    /**
     * Derermine se o usuário pode excluir o modelo.
     */
    public function delete(User $user, Sale $sale): bool
    {
        return false;
    }

    /**
     * Derermine se o usuário pode restaurar o modelo.
     */
    public function restore(User $user, Sale $sale): bool
    {
        return false;
    }

    /**
     * Derermine se o usuário pode excluir permanentemente o modelo.
     */
    public function forceDelete(User $user, Sale $sale): bool
    {
        return false;
    }
}
