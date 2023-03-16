<?php

namespace App\Providers;

use App\Service\Storage\SessionStorage;
use Illuminate\Support\ServiceProvider;
use App\Service\Storage\Contract\StorageInterface;

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
        $this->app->bind(StorageInterface::class, function ($app) {
			return new SessionStorage('cart');
		});
    }
}
