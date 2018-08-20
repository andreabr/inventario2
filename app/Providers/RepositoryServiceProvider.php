<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\ComputerRepository::class, \App\Repositories\ComputerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SectorRepository::class, \App\Repositories\SectorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EntitiesPrinterRepository::class, \App\Repositories\EntitiesPrinterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Entities\PrinterRepository::class, \App\Repositories\Entities\PrinterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PrinterRepository::class, \App\Repositories\PrinterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PrinterRepository::class, \App\Repositories\PrinterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MonitorRepository::class, \App\Repositories\MonitorRepositoryEloquent::class);
        //:end-bindings:
    }
}
