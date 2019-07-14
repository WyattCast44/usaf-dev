<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GSuite\GSuite;

class GSuiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GSuite::class, function ($app) {
            return new GSuite;
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
