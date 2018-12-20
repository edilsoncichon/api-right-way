<?php

namespace App\Domains\Category;

use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * @param Category $item
     * @return array
     */
    public function transform(Category $item)
    {
        return [
            'id'          => (int) $item->id,
            'name'        => $item->name,
            'name_slug'   => $item->name_slug,
            'description' => $item->description,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/categories/'.$item->id,
                ]
            ]
        ];
    }
}
