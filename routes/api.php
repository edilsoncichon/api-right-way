<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Categories\ListCategories;
use App\Http\Controllers\V1\Categories\GetCategory;
use App\Http\Controllers\V1\Categories\DeleteCategory;
use App\Http\Controllers\V1\Categories\CreateCategory;
use App\Http\Controllers\V1\Categories\UpdateCategory;

/**
 * /categories
 */

Route::get('/categories', ListCategories::class);
Route::get('/categories/{id}', GetCategory::class);
Route::delete('/categories/{id}', DeleteCategory::class);
Route::post('/categories', CreateCategory::class);
Route::put('/categories', UpdateCategory::class);

/**
 * /auth
 */

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\V1\Auth',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
