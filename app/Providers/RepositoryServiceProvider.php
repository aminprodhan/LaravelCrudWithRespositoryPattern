<?php

namespace App\Providers;

use App\Interfaces\Customer\CustomerAuthRepositoryInterface;
use App\Interfaces\Customer\CustomerSharedRepositoryInterface;
use App\Repository\Customer\CustomerAuthRepository;
use App\Repository\Customer\CustomerSharedRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CustomerSharedRepositoryInterface::class,CustomerSharedRepository::class);
        $this->app->bind(CustomerAuthRepositoryInterface::class,CustomerAuthRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
