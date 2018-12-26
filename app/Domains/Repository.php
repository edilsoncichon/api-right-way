<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class Repository
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $queryBuilder;

    /**
     * @var int $perPage
     */
    protected $perPage = 15;

    public function __construct()
    {
        $this->getQueryBuilder();
    }

    private function getQueryBuilder()
    {
        $this->queryBuilder = $this->model::query();
        return $this;
    }
}
