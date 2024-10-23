<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterUserController extends Controller
{
    public function __invoke(RegisterUserRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $token = $user->createToken('api_key')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Register Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }
}
