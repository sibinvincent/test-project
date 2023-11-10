<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repositories\Contracts\UserRepository::class,\App\Repositories\Implementations\UserRepository::class);
        $this->app->bind(\App\Repositories\Contracts\TransactionRepository::class,\App\Repositories\Implementations\TransactionRepository::class);
        $this->app->bind(\App\Repositories\Contracts\WalletRepository::class,\App\Repositories\Implementations\WalletRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
