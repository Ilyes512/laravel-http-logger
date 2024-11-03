<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger;

use Illuminate\Support\ServiceProvider;

class HttpLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/http_logger.php', 'http_logger');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/http_logger.php' => $this->app->configPath('http_logger.php'),
        ], 'http-logger-config');
    }
}
