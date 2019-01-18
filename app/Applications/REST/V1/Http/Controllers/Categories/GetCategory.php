<?php

namespace App\Applications\REST\V1\Http\Controllers\Categories;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Applications\REST\V1\Http\Validators\IdRequiredInUrl;

class GetCategory extends ApiController
{
    /**
     * @param IdRequiredInUrl $request
     * @param Repository $repository
     * @param Transformer $transformer
     * @return string
     * @throws \Exception
     */
    public function __invoke(
        IdRequiredInUrl $request,
        Repository $repository,
        Transformer $transformer
    ){
        $item = $repository->getById($request->id);
        return $this->createResponseItem($item, $transformer);
    }
}
