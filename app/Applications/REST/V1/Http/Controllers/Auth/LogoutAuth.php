<?php

namespace App\Applications\REST\V1\Http\Controllers\Auth;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Auth\AuthService;

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
