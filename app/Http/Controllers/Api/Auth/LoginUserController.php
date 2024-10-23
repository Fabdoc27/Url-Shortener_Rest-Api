<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Http\JsonResponse;

class LoginUserController extends Controller
{
    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials',
            ], 422);
        }

        $user = auth()->user();
        $token = $user->createToken('api_key')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }
}
