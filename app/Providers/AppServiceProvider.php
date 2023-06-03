<?php

namespace App\Providers;

use App\Repository\AccountSellRepositoryEloquent;
use Core\Domain\Repository\AccountSellRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->app->singleton(
            abstract: AccountSellRepositoryInterface::class,
            concrete: AccountSellRepositoryEloquent::class,
        );
    }
}
