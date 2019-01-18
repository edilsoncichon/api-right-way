<?php

namespace App\Applications\REST\V1\Http\Controllers\Auth;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Auth\AuthService;

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
