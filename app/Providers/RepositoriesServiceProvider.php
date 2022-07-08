<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RestaurantRepository;
use App\Repositories\RestaurantRepositoryInterface;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            RestaurantRepositoryInterface::class,
            RestaurantRepository::class
        );
    }

    public function provides()
    {
        return [
            RestaurantRepositoryInterface::class
        ];
    }
}
