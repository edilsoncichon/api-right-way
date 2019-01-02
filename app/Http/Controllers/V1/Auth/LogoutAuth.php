<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\AuthService;
use App\Http\Controllers\V1\ApiController;

class LogoutAuth extends ApiController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @param AuthService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthService $service)
    {
        $service->logout();
        return $this->getResponseMessage('Successfully logged out');
    }
}
