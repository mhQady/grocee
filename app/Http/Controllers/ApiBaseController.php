<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BaseContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiBaseController extends Controller
{
    protected $repo;

    protected $modelResource;

    protected $relations = [];

    protected $statusCode;


    public function __construct(BaseContract $repo, $modelResource = JsonResource::class)
    {
        $this->repo = $repo;
        $this->modelResource = $modelResource;

        // Include embedded data
        if (request()->has('embed')) {
            $this->parseIncludes(request('embed'));
        }
    }


    public function index(
        $page = 1,
        $limit = 10,
        $order = 'id',
        $orderDir = "desc",
        $applyOrder = false,
        $fields = [],
    ) {
        // $page = 1;
        // $limit = 10;
        // $order = 'id';
        // $orderDir = "desc";
        // $applyOrder = false;

        $filters = request()->all();

        if (request()->has('applyOrder')) {
            $applyOrder = request('applyOrder');
        }

        if (request()->has('page')) {
            $page = request('page');
        }

        if (request()->has('limit')) {
            $limit = request('limit');
        }

        if (request()->has('order')) {
            $order = request('order');
        }

        if (request()->has('orderDir')) {
            $orderDir = request('orderDir');
        }

        $models = $this->repo->search(
            $filters,
            $this->relations,
            $applyOrder,
            $page,
            $limit,
            $order,
            $orderDir,
            $fields
        );

        return $this->respondWithCollection($models);
    }

    protected function respondWithCollection($collection, int $statusCode = null, array $headers = [])
    {
        $statusCode = $statusCode ?? Response::HTTP_OK;
        $resources = forward_static_call([$this->modelResource, 'collection'], $collection);
        // return [$resources, ' | ', $collection];
        // dd($resources);
        return $this->setStatusCode($statusCode)->respond($resources, $headers);
    }

    protected function respond($resources, $headers = [])
    {
        return $resources
            ->additional(['status' => $this->getStatusCode()])
            ->response()
            ->setStatusCode($this->getStatusCode())
            ->withHeaders($headers);
    }

    protected function parseIncludes($embed)
    {
        $this->relations = explode('|', $embed);
    }

    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    protected function getStatusCode()
    {
        return $this->statusCode ?: Response::HTTP_OK;
    }

    protected function respondWithArray($data, $headers = [])
    {
        return response()->json($data, $data['status'], $headers);
    }

    protected function respondWithModel($model, int $statusCode = null, array $headers = [])
    {
        $statusCode = $statusCode ?? Response::HTTP_OK;

        $resource = new $this->modelResource($model);

        return $this->setStatusCode($statusCode)->respond($resource, $headers);
    }

    protected function respondWithSuccess($message = 'success', $data = [])
    {
        $response = [
            'status' => Response::HTTP_OK,
        ];

        if (!empty($message)) {
            $response['message'] = __($message);
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return $this->setStatusCode(Response::HTTP_OK)->respondWithArray($response);
    }

    protected function respondWithError($message)
    {
        if ($this->statusCode === Response::HTTP_OK) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return $this->respondWithErrors($message, $this->statusCode);
    }

    protected function respondWithErrors($errors = 'messages.error', $statusCode = null, $data = [], $message = null)
    {
        $statusCode = !empty($statusCode) ? $statusCode : Response::HTTP_BAD_REQUEST;

        if (is_string($errors)) {
            $errors = __($errors);
        }

        $response = ['status' => $statusCode, 'errors' => $errors];

        if (!empty($message)) {
            $response['message'] = $message;
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return $this->setStatusCode($statusCode)->respondWithArray($response);
    }

    protected function respondWithBoolean($result)
    {
        return $result ? $this->respondWithSuccess() : $this->errorUnknown();
    }

    /***
     * *******************************************************************************************
     * *******************************************************************************************
     */

    /**
     * Generates a Response with a 403 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(Response::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorUnknown($message = 'dashboard.unknown_error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }
}
