<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ilyes512\HttpLogger\Models\HttpLoggerResponse;
use Ilyes512\HttpLogger\Tests\Feature\FeatureTestCase;

final class HttpLoggerResponseTest extends FeatureTestCase
{
    use RefreshDatabase;

    public function testHttpLoggerResponse(): void
    {
        $httpLoggerRequest = HttpLoggerResponse::factory()->create();

        $this->assertDatabaseHas(HttpLoggerResponse::class, ['id' => $httpLoggerRequest->id]);
    }
}
