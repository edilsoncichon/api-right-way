<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\V1\ApiController;
use Illuminate\Support\Facades\Auth;

class MeAuth extends ApiController
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return $this->response->setData(Auth::user());
    }
}
