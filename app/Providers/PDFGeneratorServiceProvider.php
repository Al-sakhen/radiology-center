<?php
// app/Providers/PDFGeneratorServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libraries\PDFGenerator;

class PDFGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pdf', function ($app) {
            return new PDFGenerator();
        });
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

