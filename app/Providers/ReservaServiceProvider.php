<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReservaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ReservaService', function($app) {
            return new ReservaService();
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
