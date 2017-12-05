<?php

namespace App\Providers;

use App\Services\DisciplineService;
use Illuminate\Support\ServiceProvider;

class DisciplineServiceProvider extends ServiceProvider
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
        $this->app->bind(DisciplineService::class, function($app)
        {
            return new DisciplineService();
        });
    }
}
