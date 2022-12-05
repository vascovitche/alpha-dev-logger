<?php

namespace AlphaDevTeam\Logger\Providers;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../config/logging-alpha.php' => config_path('logging-alpha.php'),
        ], 'logger-config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../config/logging-alpha.php' => config_path('logging-alpha.php'),
        ], 'logger-config');

    }
}
