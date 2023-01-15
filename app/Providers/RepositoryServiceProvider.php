<?php

namespace App\Providers;

use App\Interfaces\Customer\CustomerAuthRepositoryInterface;
use App\Interfaces\Customer\CustomerSharedRepositoryInterface;
use App\Interfaces\Notfication\FcmInterface;
use App\Interfaces\Shared\CrudInterface;
use App\Repository\Customer\CustomerAuthRepository;
use App\Repository\Customer\CustomerSharedRepository;
use App\Repository\Notification\FcmRepository;
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
        $this->app->bind(CrudInterface::class,CustomerBookingRepository::class);
        $this->app->bind(FcmInterface::class,FcmRepository::class);
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
