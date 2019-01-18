<?php

namespace App\Applications\REST\V1\Http\Controllers\Auth;

use App\Applications\REST\V1\Http\Controllers\ApiController;
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
