<?php

namespace App\Providers;
use App\Interfaces\Customer\CustomerSharedRepositoryInterface;
use App\Interfaces\Notfication\FcmInterface;
use App\Interfaces\Shared\AuthInterface;
use App\Interfaces\Shared\CrudInterface;
use App\Repository\Customer\CustomerAuthRepository;
use App\Repository\Customer\CustomerSharedRepository;
use App\Repository\Notification\FcmRepository;
use App\Repository\User\UserAuthRepository;
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
        $this->app->bind(AuthInterface::class,CustomerAuthRepository::class);
        $this->app->bind(AuthInterface::class,UserAuthRepository::class);
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
