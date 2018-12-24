<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Categories\ListCategories;
use App\Http\Controllers\V1\Categories\GetCategory;
use App\Http\Controllers\V1\Categories\DeleteCategory;
use App\Http\Controllers\V1\Categories\CreateCategory;


Route::get('/categories', ListCategories::class);
Route::get('/categories/{id}', GetCategory::class);
Route::delete('/categories/{id}', DeleteCategory::class);
Route::post('/categories', CreateCategory::class);
