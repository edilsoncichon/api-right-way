<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Http\Controllers\V1\ApiController;
use Illuminate\Http\Request;

class DeleteCategory extends ApiController
{
    /**
     * @param Request $request
     * @param Repository $repository
     * @param Transformer $transformer
     * @return array
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Repository $repository,
        Transformer $transformer
    ){
        $id = intval($request->id);
        if ($id == 0) {
            throw new \Exception('Parameter ID is required and should be integer value.');
        }
        $repository->deleteById($id);
        return ['message' => 'Deleted with successfull!'];
    }
}
