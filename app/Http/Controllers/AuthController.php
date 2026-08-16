<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthRequest $request): JsonResponse
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) return response()->json(['message' => 'Credenciais inválidas'], 401);

        $token = $user->createToken('api-auth_' . $user->id)->plainTextToken;

        return response()->json(['token' => $token]);

    }
}
