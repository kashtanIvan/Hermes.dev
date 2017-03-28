<?php

namespace App\Providers;

use App\Helpers\GlobalHelpers;
use Illuminate\Support\ServiceProvider;

class HelperProvider extends ServiceProvider
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
        //
        $this->app->singleton('HelpFD', function($app){
            return new GlobalHelpers();
        });
    }
}
