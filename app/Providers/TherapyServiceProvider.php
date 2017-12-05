<?php

namespace App\Providers;

use App\Services\TherapyService;
use Illuminate\Support\ServiceProvider;

class TherapyServiceProvider extends ServiceProvider
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
        $this->app->bind(TherapyService::class, function($app)
        {
            return new TherapyService();
        });
    }
}
