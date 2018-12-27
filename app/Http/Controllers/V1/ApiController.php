<?php

namespace App\Http\Controllers\V1;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as CoreController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

abstract class ApiController extends CoreController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @var Manager $fractalManager
     */
    protected $fractalManager;

    /**
     * @var JsonResponse $response
     */
    protected $response;

    public function __construct(
        Manager $fractal,
        JsonResponse $response
    ){
        $this->fractalManager = $fractal;
        $this->response = $response;
    }

    /**
     * @param array $items
     * @param TransformerAbstract $transformer
     * @param LengthAwarePaginator|null $paginator
     * @return JsonResponse
     */
    protected function createResponseCollection(
        array $items,
        TransformerAbstract $transformer,
        LengthAwarePaginator $paginator = null
    ){
        $resource = new Collection($items, $transformer);
        if ($paginator != null) {
            $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        }
        $content = $this->fractalManager->createData($resource)->toJson();
        return $this->response->setContent($content);
    }

    /**
     * @param Model $item
     * @param TransformerAbstract $transformer
     * @return JsonResponse
     */
    protected function createResponseItem(
        Model $item,
        TransformerAbstract $transformer
    ){
        $resource = new Item($item, $transformer);
        $content = $this->fractalManager->createData($resource)->toJson();
        return $this->response->setContent($content);
    }

    /**
     * @param string $message
     * @param string|null $user_message
     * @return JsonResponse
     */
    protected function createResponseSuccess(string $message, string $user_message = null)
    {
        return $this->response->setData([
            'message' => $message,
            'user_message' => $user_message ?? $message,
        ]);
    }
}
