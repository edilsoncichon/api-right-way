<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Domains\Category\Validations\CreateCategory as Validator;
use App\Http\Controllers\V1\ApiController;
use League\Fractal\Resource\Item;

class CreateCategory extends ApiController
{
    /**
     * @param Validator $validator
     * @param Repository $repository
     * @param Transformer $transformer
     * @return string
     */
    public function __invoke(
        Validator $validator,
        Repository $repository,
        Transformer $transformer
    ){
        $item = $repository->create($validator->all());
        $resource = new Item($item, $transformer);
        return $this->fractalManager->createData($resource)->toJson();
    }
}
