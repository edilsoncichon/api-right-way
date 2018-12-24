<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Categories\ListCategories;
use App\Http\Controllers\V1\Categories\GetCategory;
use App\Http\Controllers\V1\Categories\DeleteCategory;


Route::get('/categories', ListCategories::class);
Route::get('/categories/{id}', GetCategory::class);
Route::delete('/categories/{id}', DeleteCategory::class);
