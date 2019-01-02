<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\V1\ApiController;

class LogoutAuth extends ApiController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
