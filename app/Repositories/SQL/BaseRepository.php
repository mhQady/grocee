<?php

namespace App\Repositories\SQL;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\BaseContract;


abstract class BaseRepository implements BaseContract
{
    protected $defaultFilters = [];

    public function __construct(protected Model $model)
    {
    }


    public function search(
        $filters = [],
        $relations = [],
        $applyOrder = true,
        $page = true,
        $limit = self::LIMIT,
        $orderBy = self::ORDER_BY,
        $orderDir = self::ORDER_DIR,
        $trashed = false
    ) {
        $query = $this->model;

        if (!empty($relations)) {
            $query = $query->with($relations);
        }

        if (!empty($filters)) {
            foreach ($this->model->getFilters() as $filter) {

                if (isset($filters[$filter])) {
                    $withFilter = "of" . ucfirst($filter);
                    $query = $query->$withFilter($filters[$filter]);
                }
            }
        }

        return $this->getQueryResult($query, $applyOrder, $page, $limit, $orderBy, $orderDir);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function retrieve(string $key = 'id', string|int $value)
    {
        return $this->model->where($key, $value)->first();
    }

    public function getQueryResult(
        $query,
        $applyOrder = true,
        $page = true,
        $limit = self::LIMIT,
        $orderBy = self::ORDER_BY,
        $orderDir = self::ORDER_DIR
    ) {
        if ($applyOrder) {
            $query = $query->orderBy($orderBy, $orderDir);
        }

        if ($page) {
            return $query->paginate($limit);
        }

        if ($limit) {
            return $query->take($limit)->get();
        }

        return $query->get();
    }
}
