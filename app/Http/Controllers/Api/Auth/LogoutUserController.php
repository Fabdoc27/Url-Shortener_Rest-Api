<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * @tags Authentication
 */
class LogoutUserController extends Controller
{
    /**
     * Logout User
     */
    public function __invoke(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout Successfully',
        ], 200);
    }
}
