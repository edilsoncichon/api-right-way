<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Http\Controllers\V1\ApiController;

class ListCategories extends ApiController
{
    public function __invoke(
        Repository $repository,
        Transformer $transformer
    ){
        $itemsPaginator = $repository->getItemsPaginated();
        $items = $itemsPaginator->items();
        return $this->createResponseCollection($items, $transformer, $itemsPaginator);
    }
}
