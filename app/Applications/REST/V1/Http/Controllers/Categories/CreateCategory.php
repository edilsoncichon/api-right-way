<?php

namespace App\Applications\REST\V1\Http\Controllers\Categories;

use App\Applications\REST\V1\Http\Controllers\ApiController;
use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Domains\Category\Validations\CreateCategory as Validator;

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
        return $this->createResponseItem($item, $transformer);
    }
}
