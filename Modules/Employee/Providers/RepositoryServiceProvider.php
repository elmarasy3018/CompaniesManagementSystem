<?php

namespace Modules\Employee\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Employee\Repositories\EmployeeRepository;
use Modules\Employee\Interfaces\EmployeeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
