<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
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
        view()->composer(['main', 'login'], ProfileComposer::class);

        // Регистрация частичного представления
        // view()->composer('header', ProfileComposer::class);
    }
}
