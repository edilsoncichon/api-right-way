<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use League\Fractal\Manager;

class ApiController extends BaseController
{
    /**
     * @var Manager $fractalManager
     */
    protected $fractalManager;

    public function __construct(Manager $fractal)
    {
        $this->fractalManager = $fractal;
    }
}
