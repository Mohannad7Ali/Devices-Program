<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Devices\DeviceRepository;
use App\Repositories\Categories\CategoryRepository;
use App\Interfaces\Devices\DeviceRepositoryInterface;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Interfaces\ClientsRequests\ClientsRequestRepositoryInterface;
use App\Repositories\ClientsRequests\ClientsRequestRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
        $this->app->bind(ClientsRequestRepositoryInterface::class, ClientsRequestRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
