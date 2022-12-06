<?php

namespace AlphaDevTeam\Logger;


use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'logger');

        $this->publishes([
            __DIR__ . '/../config/logging-alpha.php' => config_path('logging-alpha.php'),
        ], 'logger-config');
    }
}
