<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\AuthService;
use App\Http\Controllers\V1\ApiController;

class RefreshAuth extends ApiController
{
    /**
     * Refresh a token.
     *
     * @param AuthService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthService $service)
    {
        $tokenMetadata = $service->refresh();
        return $this->response->setData($tokenMetadata);
    }
}
