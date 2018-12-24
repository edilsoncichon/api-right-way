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

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getById(int $id)
    {
        return $this->queryBuilder->findOrFail($id);
    }
}
