<?php

namespace App\Domains\Auth;

use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * @param $credentials
     * @return array
     * @throws UnauthorizedException
     */
    public function login($credentials)
    {
        if (! $token = Auth::attempt($credentials)) {
            throw new UnauthorizedException('Invalid credentials');
        }
        return $this->getTokenMetadata($token);
    }

    /**
     * Log the user out (Invalidate the token).
     */
    public function logout()
    {
        Auth::logout();
    }

    /**
     * Refresh a token.
     *
     * @return array
     */
    public function refresh()
    {
        $token = Auth::refresh();
        return $this->getTokenMetadata($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function getTokenMetadata($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }
}
