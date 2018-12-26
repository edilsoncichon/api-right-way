<?php

namespace App\Http\Controllers\V1;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\Manager;

abstract class ApiController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @var Manager $fractalManager
     */
    protected $fractalManager;

    public function __construct(Manager $fractal)
    {
        $this->fractalManager = $fractal;
    }
}
