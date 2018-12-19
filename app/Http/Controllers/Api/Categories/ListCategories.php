<?php

namespace App\Http\Controllers\Api\Categories;

use App\Domains\Category\CategoryRepository;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Response;

class ListCategories extends ApiController
{
    public function __invoke(Response $response, CategoryRepository $repository)
    {
        return $repository->getAll();
    }
}
