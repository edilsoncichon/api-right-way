<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Categories\ListCategories;
use App\Http\Controllers\V1\Categories\GetCategory;


Route::get('/categories', ListCategories::class);
Route::get('/categories/{id}', GetCategory::class);
