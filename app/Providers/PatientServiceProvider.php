<?php

namespace App\Providers;

use app\Services\PatientService;
use Illuminate\Support\ServiceProvider;

class PatientServiceProvider extends ServiceProvider
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
        $this->app->bind(PatientService::class, function($app)
        {
            return new PatientService();
        });
    }
}
