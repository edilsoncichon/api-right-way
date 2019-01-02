<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\V1\ApiController;

class MeAuth extends ApiController
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json(auth()->user());
    }
}
