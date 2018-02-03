<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\EstimateRepository::class, \App\Repositories\EstimateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ItemRepository::class, \App\Repositories\ItemRepositoryEloquent::class);
        //:end-bindings:
    }
}
