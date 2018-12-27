<?php

namespace App\Http\Controllers\V1\Categories;

use App\Domains\Category\CategoryRepository as Repository;
use App\Domains\Category\CategoryTransformer as Transformer;
use App\Domains\Category\Validations\UpdateCategory as Validator;
use App\Http\Controllers\V1\ApiController;

class UpdateCategory extends ApiController
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
        $item = $repository->update($validator->all());
        return $this->createResponseItem($item, $transformer);
    }
}
