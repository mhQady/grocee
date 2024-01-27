<?php

namespace App\Traits;

use ReflectionClass;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RepoTrait
{
    public function getFilters(): array
    {
        return $this->filters ?? [];
    }
}
