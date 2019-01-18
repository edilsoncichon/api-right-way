<?php

namespace App\Applications\REST\V1\Http\Controllers\Categories;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;

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
