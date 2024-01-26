<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->getModels() as $model) {
            $this->app->bind(
                "App\Repositories\Contracts\\{$model}Contract",
                "App\Repositories\SQL\\{$model}Repository"
            );
        }
    }

    protected function getModels()
    {
        $files = Storage::disk('app')->files('Models');
        return collect($files)->map(function ($file) {
            return basename($file, '.php');
        });
    }
}
