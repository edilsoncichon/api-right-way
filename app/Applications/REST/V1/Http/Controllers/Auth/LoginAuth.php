<?php

namespace App\Applications\REST\V1\Http\Controllers\Auth;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Auth\AuthService;
use App\Domains\Auth\Validations\LoginValidator;
use Illuminate\Validation\UnauthorizedException;

class LoginAuth extends ApiController
{
    /**
     * Get a JWT via given credentials.
     *
     * @param LoginValidator $request
     * @param AuthService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginValidator $request, AuthService $service)
    {
        $credentials = $request->only(['email', 'password']);
        try {
            $tokenMetadata = $service->login($credentials);
            return $this->response->setData($tokenMetadata);
        } catch (UnauthorizedException $e) {
            return $this->getResponseMessage($e->getMessage(), null, 403);
        }
    }
}
