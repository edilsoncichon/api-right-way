<?php

namespace App\Domains\Category;

use App\Domains\Repository;

class CategoryRepository extends Repository
{
    protected $model = Category::class;

    /**
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginator(int $perPage = null)
    {
        return $this->queryBuilder->paginate($perPage ?? $this->perPage);
    }
}
