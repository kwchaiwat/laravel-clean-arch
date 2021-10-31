<?php

namespace App\Providers;

use App\Repositories\Bank\BankRepository;
use App\Repositories\Bank\BankRepositoryImpl;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BankRepository::class, BankRepositoryImpl::class);
        $this->app->singleton(UserRepository::class, UserRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
