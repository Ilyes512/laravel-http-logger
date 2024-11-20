<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ilyes512\HttpLogger\Models\HttpLoggerEvent;
use Ilyes512\HttpLogger\Tests\Feature\FeatureTestCase;

final class HttpLoggerEventTest extends FeatureTestCase
{
    use RefreshDatabase;

    public function testHttpLoggerEventFactory(): void
    {
        $httpLoggerRequest = HttpLoggerEvent::factory()->create();

        $this->assertDatabaseHas(HttpLoggerEvent::class, ['id' => $httpLoggerRequest->id]);
    }
}
