<?php

use Illuminate\Support\Facades\Route;

use App\Applications\REST\V1\Http\Controllers\Auth\LoginAuth;
use App\Applications\REST\V1\Http\Controllers\Auth\LogoutAuth;
use App\Applications\REST\V1\Http\Controllers\Auth\MeAuth;
use App\Applications\REST\V1\Http\Controllers\Auth\RefreshAuth;
use App\Applications\REST\V1\Http\Controllers\Categories\ListCategories;
use App\Applications\REST\V1\Http\Controllers\Categories\GetCategory;
use App\Applications\REST\V1\Http\Controllers\Categories\DeleteCategory;
use App\Applications\REST\V1\Http\Controllers\Categories\CreateCategory;
use App\Applications\REST\V1\Http\Controllers\Categories\UpdateCategory;

Route::prefix('categories')->middleware('auth:api')->group(function () {
    Route::get('/', ListCategories::class);
    Route::get('{id}', GetCategory::class);
    Route::delete('{id}', DeleteCategory::class);
    Route::post('/', CreateCategory::class);
    Route::put('/', UpdateCategory::class);
});

Route::prefix('auth')->group(function () {
    Route::post('login', LoginAuth::class);
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', LogoutAuth::class);
        Route::post('refresh', RefreshAuth::class);
        Route::get('me', MeAuth::class);
    });
});
