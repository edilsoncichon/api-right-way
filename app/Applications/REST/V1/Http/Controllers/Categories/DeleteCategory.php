<?php

namespace App\Applications\REST\V1\Http\Controllers\Categories;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Applications\REST\V1\Http\Validators\IdRequiredInUrl;
use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;

class DeleteCategory extends ApiController
{
    /**
     * @param IdRequiredInUrl $request
     * @param Repository $repository
     * @param Transformer $transformer
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function __invoke(
        IdRequiredInUrl $request,
        Repository $repository,
        Transformer $transformer
    ){
        $repository->deleteById($request->id);
        return $this->getResponseMessage(__('messages.deleted'));
    }
}
