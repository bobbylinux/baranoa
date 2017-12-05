<?php

namespace App\Providers;

use App\Services\PhysiotherapistService;
use Illuminate\Support\ServiceProvider;

class PhysiotehrapistServiceProvider extends ServiceProvider
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
        $this->app->bind(PhysiotherapistService::class, function($app)
        {
            return new PhysiotherapistService();
        });
    }
}
