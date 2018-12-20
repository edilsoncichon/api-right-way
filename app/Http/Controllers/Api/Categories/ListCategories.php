<?php

namespace App\Http\Controllers\Api\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Http\Controllers\Api\ApiController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

class ListCategories extends ApiController
{
    public function __invoke(Repository $repository, Transformer $transformer)
    {
        $paginator = $repository->getPaginator();
        $items = $paginator->items();
        $resource = new Collection($items, $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractalManager->createData($resource)->toJson();
    }
}
