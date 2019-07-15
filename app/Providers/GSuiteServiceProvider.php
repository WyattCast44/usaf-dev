<?php

namespace App\Providers;

use App\Services\GSuite\GSuite;
use Illuminate\Support\ServiceProvider;
use App\Services\GSuite\GSuiteUserRepository;
use App\Services\GSuite\GSuiteGroupRepository;
use Illuminate\Contracts\Support\DeferrableProvider;

class GSuiteServiceProvider extends ServiceProvider implements DeferrableProvider
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

        $this->app->bind(GSuiteUserRepository::class, function ($app) {
            return new GSuiteUserRepository;
        });

        $this->app->bind(GSuiteGroupRepository::class, function ($app) {
            return new GSuiteGroupRepository;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [GSuite::class, GSuiteUserRepository::class];
    }
}
