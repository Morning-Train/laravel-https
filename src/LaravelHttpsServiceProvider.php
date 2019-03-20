<?php

namespace MorningTrain\Laravel\Https;


use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class LaravelHttpsServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/https.php' => config_path('https.php'),
            ], 'laravel-https-config');
        }
    }

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
        if (config('https.use_ssl', false)) {
            URL::forceScheme('https');
        }

    }

}
