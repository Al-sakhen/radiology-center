<?php

namespace App\Providers;

use App\Models\CenterInformation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();


        View::composer('*', function ($view) {
            $public_center_informations = CenterInformation::first() ?? new CenterInformation();
            view()->share(compact('public_center_informations'));
        });
    }
}
