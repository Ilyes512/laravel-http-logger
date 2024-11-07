<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Feature;

use Illuminate\Config\Repository as Config;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Ilyes512\HttpLogger\Eloquent\HttpLoggerEvent;
use Ilyes512\HttpLogger\Eloquent\HttpLoggerRequest;
use Ilyes512\HttpLogger\Eloquent\HttpLoggerResponse;
use Orchestra\Testbench\Attributes\DefineEnvironment;

class MigrationsTest extends FeatureTestCase
{
    use RefreshDatabase;

    public function testTablesAreAutoMigrated(): void
    {
        $database = config()->string('http_logger.database');

        self::assertSame('testing', $database, 'The database is not set to "testing"');

        foreach ($this->getTables() as $table) {
            $message = sprintf('Table "%s" exists in the database "%s"', $table, $database);

            self::assertTrue(Schema::connection($database)->hasTable($table), $message);
        }
    }

    #[DefineEnvironment('disableAutoMigrations')]
    public function testTablesDontGetAutoMigratedWhenTurnedOff(): void
    {
        $database = config()->string('http_logger.database');

        self::assertSame('testing', $database, 'The database is not set to "testing"');

        foreach ($this->getTables() as $table) {
            $message = sprintf('Table "%s" exists in the database "%s"', $table, $database);

            self::assertFalse(Schema::connection($database)->hasTable($table), $message);
        }
    }

    protected function disableAutoMigrations(Application $app): void
    {
        /** @var Config $config */
        $config = $app->make(Config::class);

        $config->set('http_logger.auto_migrate', false);
    }

    /**
     * @return list<string>
     */
    private function getTables(): array
    {
        return [
            (new HttpLoggerEvent())->getTable(),
            (new HttpLoggerRequest())->getTable(),
            (new HttpLoggerResponse())->getTable(),
        ];
    }
}
