<?php

namespace App\Providers;

use App\Repository\AccountSellRepositoryEloquent;
use Core\Domain\Repository\AccountSellRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;

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

        Blade::directive('money', function($amount) {
            return "<?php echo 'R$ ' . number_format($amount, 2, ',', ''); ?>";
        });

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
