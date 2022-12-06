<?php

namespace AlphaDevTeam\Logger;

use AlphaDevTeam\Logger\Console\Commands\RefreshLogsTable;
use AlphaDevTeam\Logger\Console\Commands\SetDbLoggerConfig;
use Illuminate\Support\Facades\Route;
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
        $this->registerMigration();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerConfig();
        $this->registerConsoleCommands();
    }

    protected function registerMigration()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('logger-alpha.panel.path'),
            'middleware' => config('logger-alpha.panel.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'logger');
    }

    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/logger-alpha.php' => config_path('logger-alpha.php'),
        ], 'logger-config');
    }

    protected function registerConsoleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RefreshLogsTable::class,
            ]);
        }
    }
}
