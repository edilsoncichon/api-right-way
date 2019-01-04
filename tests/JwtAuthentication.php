<?php

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\Facades\JWTAuth;

trait JwtAuthentication
{
    /**
     * Overrides the default actingAs() method to set the user token when
     * testing in Laravel.
     *
     * @param Authenticatable $user
     * @param null $driver
     * @return static
     */
    public function actingAs(Authenticatable $user, $driver = null)
    {
        if (method_exists($this, 'withHeader')) {
            $token = JWTAuth::fromUser($user);
            $this->withHeader('Authorization', 'Bearer '.$token);
        }
        return $this;
    }
}
