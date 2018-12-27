<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Http\Controllers\V1\ApiController;
use App\Http\Validators\IdRequiredInUrl;

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
        return $this->createResponseSuccess(__('messages.deleted'));
    }
}
