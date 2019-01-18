<?php

namespace App\Applications\REST\V1;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RestApiServiceProvider extends ServiceProvider
{
    protected $routes_path = 'app/Applications/REST/V1/Http/routes.php';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiV1Routes();
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiV1Routes()
    {
        Route::prefix('v1')
            ->middleware('api')
            ->group(base_path($this->routes_path));
    }
}
