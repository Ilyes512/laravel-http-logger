<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger;

use Illuminate\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;

class HttpLoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishConfig();
            $this->registerPublishMigrations();
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/http_logger.php', 'http_logger');
    }

    public function boot(): void
    {
        /** @var Config $config */
        $config = $this->app->make(Config::class);

        if ($this->app->runningInConsole()) {
            $this->loadMigrations($config);
        }
    }

    protected function registerPublishConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/http_logger.php' => $this->app->configPath('http_logger.php'),
        ], 'http-logger-config');
    }

    protected function registerPublishMigrations(): void
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath('migrations'),
        ], 'http-logger-migrations');
    }

    protected function loadMigrations(Config $config): void
    {
        if ($config->boolean('http_logger.auto_migrate', true)) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}
