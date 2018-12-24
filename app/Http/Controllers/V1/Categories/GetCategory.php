<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Http\Controllers\V1\ApiController;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;

class GetCategory extends ApiController
{
    /**
     * @param Request $request
     * @param Repository $repository
     * @param Transformer $transformer
     * @return string
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Repository $repository,
        Transformer $transformer
    ){
        $id = intval($request->id);
        if ($id == 0) {
            throw new \Exception('Parameter ID shoud be integer value.');
        }
        $item = $repository->getById($id);
        $resource = new Item($item, $transformer);
        return $this->fractalManager->createData($resource)->toJson();
    }
}
