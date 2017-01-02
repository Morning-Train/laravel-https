<?php

namespace morningtrain\https;

use Illuminate\Support\ServiceProvider;
use URL;

class httpsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        /*
		 * If the use_ssl setting has been set in the environment,
		 * and if true, enforce https in all generated urls.
		 */
        if (config('packages.https.use_ssl', false))
        {
            URL::forceSchema('https');
        }

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->publishes([
            __DIR__.'/config/' => base_path('config') . '/packages'
        ], 'config');

    }
}