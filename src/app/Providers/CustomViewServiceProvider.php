<?php

namespace App\Providers;

use App\View\Composers\HomePageComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CustomViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('profile', ProfileComposer::class);
        // Регистрация макета
        view()->composer(['home', 'login'], HomePageComposer::class);

        // Регистрация частичного представления
        // view()->composer('header', ProfileComposer::class);
    }
}
