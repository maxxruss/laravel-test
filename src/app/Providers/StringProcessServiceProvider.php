<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Math\MathServices;
use App\Services\StringProcessingService;

class StringProcessServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MathServices::class, function ($app) {
            return new MathServices();
        });

        $this->app->singleton(StringProcessingService::class, function ($app) {
            return new StringProcessingService($app->make(MathServices::class));
        });
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
